<?php




Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::get('/', 'MainController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/posts', 'PostsController');
    Route::resource('/users', 'UsersController');
});






Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{slug}','HomeController@postView')->name('post');
