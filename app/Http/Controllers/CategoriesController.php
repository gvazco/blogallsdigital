<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    
	public function show(Category $category)
	{

		$posts = $category->posts()->published()->paginate(5);

		if ( request()->wantsJson())
		{

			return $posts;

		}

		return view('pages.home', [

			'title' => "Publicaciones asociadas a: '{$category->name}'",
			'posts' =>  $posts

		]);

	}

}
