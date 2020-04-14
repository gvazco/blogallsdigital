<?php

Route::get('posts', 'PagesController@home');
Route::get('blog/{post}', 'PostsController@show');
Route::get('categorias/{category}', 'CategoriesController@show');
Route::get('etiquetas/{tag}', 'TagsController@show');
Route::get('archivo', 'PagesController@archive');

Route::post('messages', function(){


	//Validar datos
	//Enviar un email

	return response()->json([

		'status' => 'OK'

	]);

});