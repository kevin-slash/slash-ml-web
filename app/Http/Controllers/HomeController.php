<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use GuzzleHttp\Exception\GuzzleException;
use App\Http\Requests;

class HomeController extends Controller
{
    public function index(){
    	return view('frontend.home.home');
 	}
    public function homePage(){
        return view('frontend.homepage.home-page');
    }
}
