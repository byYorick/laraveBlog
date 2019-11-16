<?php



Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::get('/', 'MainController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/posts', 'PostsController');
    Route::resource('/users', 'UsersController');
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
