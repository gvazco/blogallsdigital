<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller

{
    public function store(Post $post) 

    {

    	$this->validate(request(), [

    		'photo' => 'required|image' 

    	]);

        $post->photos()->create([

            'url' => Storage::url(request()->file('photo')->store('posts', 'public')),

        ]);
    	
     //    $photo = request()->file('photo')->store('posts', 'public');

    	// Photo::create([

    	// 	'url' => Storage::url($photo),
    	// 	'post_id' => $post->id

    	// ]);

    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        // $photoPath = str_replace('storage', 'public', $photo->url);

        // Storage::disk('public')->delete($photo->url);

        return back()->with('flash', 'Foto eliminada');
    }

}
