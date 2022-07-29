<?php 
namespace App\Helper;
use Hash;

class Helper{
    
    const VALIDATOR_FAIL_MESSAGE = 'Validator fails';

    public static function add(){
        return 'ok';
    }

    // remove unNessary or danger attact
    public static function removeDanger($str) : string
    {
        // $result  = preg_replace('/[^a-zA-Z0-9_ -]/s','',$str);
        return htmlspecialchars($str);
    }

    public static function removeDangerMultiple($data){
        $dataObj = new \stdClass();
        foreach ((array)$data as $key => $value) {
            $dataObj->$key = self::removeDanger($value);
        }
        return  $dataObj;
    }

    // Make Hash
    public static function makeHash($str){
        return Hash::make($str);
    }

    // get validate error message 
    public static function validateErrorMsg($messages){
        $messages = $messages->all();
        $data = [];
        foreach ($messages as $message) {
            $data[] = $message;
        }
        return $data;
    }

    // Unique Random Numbers Within Range
    public static function randomNumber($length) {
        $result = '';
        for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }
        return $result;
    }
    public static function imgrandomNumber($length){
        return substr(str_shuffle(str_repeat($x='0123456789qwertyuiopasdfghjklzxcvbnm', ceil($length/strlen($x)))), 1 , $length);
    }
    public static function supportImageExtention(){
        return [
            null,
            'png',
            'jpg',
            'jpeg',
            'webp'
        ];
    }

    public static function supportedImagePathType(){
        return [
            null,
            'product',
            'customer',
            'vendor',
            'admin',
            'others',
            'static'
        ];
    }


    public static function whiteListIp()
    {   
        // if your are get this from database 
        // database code is here
        return [
            '127.0.0.1',
            '128.34.34.12',
        ];
    }
    
}