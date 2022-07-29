<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helper\RespondsWithHttpStatus;
use Helper;

class ImageGuard
{   
    use RespondsWithHttpStatus;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        // if(in_array($request->ip(), Helper::whiteListIp())){
        //     \Log::error('IP address is not whitelisted', ['ip address', $request->ip()]);
        //     return $this->failure('IP address is not whitelisted');
        // }

        // check supported image path type
        $imageType = $request->imageType;
        // $imageType = $request->header('imageType');
        $request->attributes->set('imageType', $imageType);
        if(!array_search($imageType, Helper::supportedImagePathType())){
            return $this->failure('Set your real image path in header');
        }

        //
        if($request->hasFile('image')){
            $extension = $request->file('image')->extension();
            $request->attributes->set('extension', $extension);
        } 
       
        // check supported image extention
        if(!array_search($extension, Helper::supportImageExtention())){
            return $this->failure('This type of image is not supported');
        }

        return $next($request);
    }
}
