<?php

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
        /*===================================
        =            Rutas Email            =
        ===================================*/
        Route::get('email', function(){

            return new App\Mail\LoginCredentials(App\User::first(), 'asd123');

        });
        
        
        /*=====  End of Rutas Email  ======*/
        

        /*===================================
        =            Rutas Index            =
        ===================================*/  

        Route::get('', 'PagesController@home')->name('pages.home');


        Route::get('about', 'PagesController@about')->name('pages.about');
        Route::get('archive', 'PagesController@archive')->name('pages.archive');
        Route::get('contact', 'PagesController@contact')->name('pages.contact');

        # ======  End of Rutas Index =======

        /*======================================
        =            Rutas del Blog            =
        ======================================*/

        Route::get('blog/{post}', 'PostsController@show')->name('posts.show');
        Route::get('categorias/{category}', 'CategoriesController@show')->name('categories.show');
        Route::get('etiquetas/{tag}', 'TagsController@show')->name('tags.show');

        # ======  End of Rutas del Blog =======

        # ===============================================
        # =           Rutas de Administración           =
        # ===============================================
        
        Route::group([
            'prefix' => 'admin', 
            'namespace' => 'Admin', 
            'middleware' => 'auth'], 
 
            function(){

                Route::get('/', 'AdminController@index')->name('dashboard');

                Route::resource('posts', 'PostsController', ['except' => 'show', 'as' => 'admin']);
                Route::resource('users', 'UsersController', ['as' => 'admin']);
                Route::resource('roles', 'RolesController', ['except' => 'show', 'as' => 'admin']);
                Route::resource('permissions', 'PermissionsController', ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);


                Route::middleware('role:Admin')
                    ->put('users/{user}/roles', 'UsersRolesController@update')
                    ->name('admin.users.roles.update');

                Route::middleware('role:Admin')
                    ->put('users/{user}/permissions', 'UsersPermissionsController@update')
                    ->name('admin.users.permissions.update');

                
                Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
                Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');


            });
        
        # ======  End of Rutas de Administración  =======
        

    // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        

        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');

        // SPA VueJs Route

        Route::get('/{any?}', 'PagesController@spa')->name('pages.home')->where('any', '.*');