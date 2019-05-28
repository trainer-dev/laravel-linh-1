<?php

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
Route::post('/password/reset', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.reset');

Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register/store','Auth\RegisterController@register')->name('register.store');


Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'User'], function() {
    Route::get('/post/create', 'PostController@create')->name("post.create");
    Route::post('/post/store', 'PostController@store')->name("post.store");
//    Route::get('/post/delete/{id}','PostController@delete')->name("post.delete");
    Route::get('/post/edit/{id}','PostController@edit')->name("post.edit");
    Route::post('/post/update','PostController@update')->name("post.update");

    Route::get('/user','UserBlogController@get')->name('user.user');
    Route::post('/user/show','UserBlogController@show')->name('user.show');

    Route::get('/blog/{id}','CommentController@get')->name('user.blog');
    Route::post('/comment/store', 'CommentController@store')->name('comment.add');

    Route::get('user/setting','UserController@get')->name('user.setting');
    Route::get('user/setting/store','UserController@store')->name('user.setting.store');
});

Route::group(['namespace' => 'Admin'], function() {
    Route::get('/admin','AdminController@index')->name('admin');
    Route::get('admin/post','BlogController@get')->name('admin.post');

    Route::get('admin/user','UserController@index')->name('admin.user');
    Route::delete('admin/user/delete/{  id}','UserController@delete')->name("admin.user.delete");
    Route::get('admin/user/restore','UserController@restoreUser')->name("admin.user.restore");
    Route::get('admin/user/restore/{id}','UserController@restore')->name("admin.user.restore.{id}");
    Route::delete('admin/user/destroy/{id}','UserController@destroy')->name('admin.user.destroy.{id}');
    Route::get('admin/user/create','UserController@create')->name("admin.user.create");
    Route::post('admin/user/store','UserController@store')->name("admin.user.store");
    Route::get('admin/user/profile/{id}','UserController@profile')->name('admin.user.profile');
    Route::post('admin/user/update','UserController@update')->name('admin.user.update');
    Route::post('admin/user/change','UserController@pass')->name('admin.user.change');
    Route::post('admin/user/role','UserController@role')->name('admin.user.role');

    Route::get('admin/blog','AdminBlogController@get')->name('admin.blog');
    Route::get('admin/blog/{id}','AdminBlogController@comment')->name('admin.blog.detail}');
    Route::get('admin/blog/posts/{id}','AdminBlogController@posts')->name('admin.blog.posts');
    Route::post('admin/blog/store','AdminBlogController@store')->name('admin.blog.store');
    Route::delete('admin/blog/delete/{id}','AdminBlogController@delete')->name('admin.blog.delete');

    Route::get('admin/blog/comment/{id}','CommentController@edit')->name('admin.blog.comment.{id}');
    Route::post('admin/blog/comment/store','CommentController@store')->name('admin.blog.comment.store');
    Route::delete('admin/blog/comment/delete/{id}','CommentController@delete')->name('admin.blog.comment.delete.{id}');
});
