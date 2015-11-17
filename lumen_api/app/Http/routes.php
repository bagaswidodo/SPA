<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->welcome();
});

// public function resource($uri, $controller)
// {
//     $this->get($uri, 'App\Http\Controllers\\'.$controller.'@index');
//     $this->get($uri.'/create', 'App\Http\Controllers\\'.$controller.'@create');
//     $this->post($uri, 'App\Http\Controllers\\'.$controller.'@store');
//     $this->get($uri.'/{id}', 'App\Http\Controllers\\'.$controller.'@show');
//     $this->get($uri.'/{id}/edit', 'App\Http\Controllers\\'.$controller.'@edit');
//     $this->put($uri.'/{id}', 'App\Http\Controllers\\'.$controller.'@update');
//     $this->patch($uri.'/{id}', 'App\Http\Controllers\\'.$controller.'@update');
//     $this->delete($uri.'/{id}', 'App\Http\Controllers\\'.$controller.'@destroy');

//     return $this;
// }
$prefix = 'api/v1';
$namespace = 'App\Http\Controllers';


//example API articles API
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
    $app->get('/articles', ['uses' => 'ArticleController@getArticles', 'as' => 'allArticles']);
    $app->get('/article/{id}', ['uses' => 'ArticleController@getArticle', 'as' => 'singleArticle']);
    $app->post('/article', ['uses' => 'ArticleController@saveArticle', 'as' => 'saveArticle']);
    $app->put('/article/{id}', ['uses' => 'ArticleController@updateArticle', 'as' => 'updateArticle']);
    $app->delete('/article/{id}', ['uses' => 'ArticleController@deleteArticle', 'as' => 'deleteArticle']);
});

//API for nearby
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
    $app->get('/nearby/{location}', ['uses' => 'NearbyController@getNearby', 'as' => 'singleArticle']);
});

//API for user
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
    $app->get('/users', ['uses' => 'UserController@getAllUsers', 'as' => 'allUsers']);
    $app->get('/user/{id}', ['uses' => 'UserController@getUser', 'as' => 'singleUser']);
    $app->post('/user', ['uses' => 'UserController@saveUser', 'as' => 'saveUser']);
    $app->put('/user/{id}', ['uses' => 'UserController@updateUser', 'as' => 'updateUser']);
    $app->delete('/user/{id}', ['uses' => 'UserController@deleteUser', 'as' => 'deleteUser']);
});


// API for faskes
// done, tinggal debugging error handling
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
    $app->get('/faskes',      ['uses' => 'FaskesController@all', 'as' => 'allFaskes']);
    $app->get('/faskes/{id}', ['uses' => 'FaskesController@show', 'as' => 'singleFaskes']);
    $app->post('/faskes',     ['uses' => 'FaskesController@store', 'as' => 'saveFaskes']);
    $app->put('/faskes/{id}', ['uses' => 'FaskesController@update', 'as' => 'updateFaskes']);
    $app->delete('/faskes/{id}', ['uses' => 'FaskesController@destroy', 'as' => 'deleteFaskes']);
});


//API for faskes open
// done, tinggal debugging error handling
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
   $app->get('/faskes/{id}/open', ['uses' => 'FaskesOpenController@all', 'as' => 'singleFaskesOpen']);
    $app->post('/faskes/{id}/open', ['uses' => 'FaskesOpenController@store', 'as' => 'saveFaskesOpen']);
    $app->put('/faskes/{id}/open/{hari}', ['uses' => 'FaskesOpenController@update', 'as' => 'updateFaskesOpen']);
    $app->delete('/faskes/{id}/open/{hari}', ['uses' => 'FaskesOpenController@destroy', 'as' => 'deleteFaskesOpen']);
});

//API for dokter faskes
//done, debugging error handling
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
    $app->get('/faskes/{id}/dokter', ['uses' => 'FaskesDokterController@show', 'as' => 'singleFaskesOpen']);
    $app->post('/faskes/{id}/dokter', ['uses' => 'FaskesDokterController@store', 'as' => 'saveFaskesOpen']);
    $app->put('/faskes/{id}/dokter/{dokter}', ['uses' => 'FaskesDokterController@update', 'as' => 'updateFaskesOpen']);
    $app->delete('/faskes/{id}/dokter/{dokter}', ['uses' => 'FaskesDokterController@destroy', 'as' => 'deleteFaskesOpen']);
});

//API for jadwal praktek dokter
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
    $app->get('/faskes/{id}/dokter/{dokter}/praktek', 
        ['uses' => 'PraktekDokterFaskesController@show', 'as' => 'singleFaskesOpen']);
    $app->post('/faskes/{id}/dokter/{dokter}/praktek', 
        ['uses' => 'PraktekDokterFaskesController@store', 'as' => 'saveFaskesOpen']);
    $app->put('/faskes/{faskes}/dokter/{dokter}/praktek/{hari}', 
        ['uses' => 'PraktekDokterFaskesController@update', 'as' => 'updateFaskesOpen']);
    $app->delete('/faskes/{id}/dokter/{dokter}/praktek/{hari}', 
        ['uses' => 'PraktekDokterFaskesController@destroy', 'as' => 'deleteFaskesOpen']);
});

// API for vote
$app->group(['namespace' => $namespace, 'prefix' => $prefix] , function($app){
    $app->get('/reviews', ['uses' => 'ReviewController@getAllFaskes', 'as' => 'allReview']);
    $app->get('/review/{id}', ['uses' => 'ReviewController@getFaskes', 'as' => 'singleReview']);
    $app->post('/review', ['uses' => 'ReviewController@saveFaskes', 'as' => 'saveReview']);
    $app->put('/review/{id}', ['uses' => 'ReviewController@updateFaskes', 'as' => 'updateReview']);
    $app->delete('/review/{id}', ['uses' => 'ReviewController@deleteFaskes', 'as' => 'deleteReview']);
});
