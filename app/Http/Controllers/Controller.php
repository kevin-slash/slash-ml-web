<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use \Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function getLang($request){

        $langSeg = $request->segment(1);
        // echo '<pre>'. print_r($langSeg,true).'</pre>'; die();
        $langSupported = array_map(function ($key, $value){
            return $key;
        }, array_keys(Config::get('laravellocalization.supportedLocales')), Config::get('laravellocalization.supportedLocales'));

        if (in_array($langSeg, $langSupported) == true ){
            $lang = $langSeg;
        }
        else{
            $lang = '';
        }

        return $lang;

    }
}
