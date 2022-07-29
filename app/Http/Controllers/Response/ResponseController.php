<?php

namespace App\Http\Controllers\Response;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Exception\NotReadableException;
use Image;
use Cache;

class ResponseController extends Controller
{
    public function response($imageType, $name){
        $size = $this->getSize($name);

        $name = $this->getName($name);

        $imagePath = storage_path('app/public').'/'.$imageType.'/'.$name;

        if(COUNT($size) !== 0){
            try {
                $img = Image::make($imagePath)->resize($size[0], $size[1]);
            } catch(NotReadableException $e) {
                return 'image not found';
            }
        }else{
            try {
                $img = Image::make($imagePath);
            } catch(NotReadableException $e) {
                return 'image not found';
            }
           
        }

        return $img->response('jpg');
        
    }

    public function getSize($name){
        $name = explode("_", $name);
       
        if(COUNT($name) == 1){
            return [];
        }
        $name = explode("x", $name[1]);
        $name = implode(" ",$name);

        $pattern = '/\..*\b/i';
        $size = preg_replace($pattern, '', $name);
        $size = explode(" ", $size);
        return $size;
    }

    public function getName($name){
        $name = explode("_",$name);
        return $name[0];
    }


}
