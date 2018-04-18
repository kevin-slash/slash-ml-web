<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$baseUrl = URL::to('/'); // baseUrl use every where with translate
$lang = LaravelLocalization::getCurrentLocale();
$langSeg = Request::segment(1);
$langSupported = array_map(function ($key, $value){
    return $key;
}, array_keys(Config::get('laravellocalization.supportedLocales')), Config::get('laravellocalization.supportedLocales'));

if (in_array($langSeg, $langSupported) == true ){
    $lang = $langSeg;
}
else{
    $lang = 'en';
}

if($lang=='en') // check is lang now === default the url is normal without lang
    $baseUrlLang=URL::to('/');
else
    $baseUrlLang=URL::to('/' . $lang) ; // baseUrl use every where with translate


View::share('baseUrl',$baseUrl); // share baseUrl Normal(without language) to all view (globle)
View::share('baseUrlLang',$baseUrlLang); // share baseUrlLang (with language) to all view (globle)
View::share('lang',$lang); // share baseUrlLang (with language) to all view (globle)


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// =============== check select menu ===============
Html::macro('clever_link', function($route) {

    // return 'wowowo';

    $path =Request::path();
    $active='';

    if ($path == 'kh'){ // home page with khmer lang
        $path = '/';
    }
    if(LaravelLocalization::getCurrentLocale()=='kh'){ // remove kh/ when in khmer lang
        $path=str_replace('kh/', '', $path);
    }

    if($route == $path) {
        $active = "active";
    }
    else {
        $active = '';
    }

    return $active;
});

// =============== check select menu ===============
HTML::macro('clever_link_mega_menu', function($route) {
    $path=Request::path();
    $active = '';
    $tmp=explode('/', $path);
    foreach ($tmp as $key => $value) {
        if($value==$route){
            $active = "active";
            return $active;
        }
    }
    
    return $active;
});

Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localize' ] // Route translate middleware
],function(){

//     Route::get('/', 'HomeController@index');
//     Route::get('/blog', 'HomeController@blogSection');
//     Route::get('/blog-detail', 'HomeController@blogDetailSection');
//     Route::get('/job-detail', 'HomeController@jobDetailSection');
//     Route::get('/apply-job', 'HomeController@applyJobSection');

    Route::get('/', 'HomeController@homePage');
    Route::get('/home-page', 'HomeController@homePage');

});