
@extends('layout')

@section('content')

<section class="posts container">

    @if(isset($title))

    <h3> {{$title}} </h3>

    @endif
 
    @forelse($posts as $post)

    <article class="post">

        @include($post->viewType('home'))

        <div class="content-post">

            @include('posts.header')

            <h1>{{ $post->title }}</h1>

            <div class="divider"></div>
            
            <p class="excerpt" style="text-align: justify;"> {{ $post->excerpt }} </p>
            
            <footer class="container-flex space-between">

                <div class="read-more">

                    <a href="{{ route('posts.show', $post) }}" class="text-uppercase c-purlple">Leer Más</a>

                </div>

                @include('posts.tags')

            </footer>

        </div>

        
    </article>

    @empty
    
        <article class="post">

        <div class="content-post">

            <h1>No hay publicaciones todavía</h1>

            <div class="divider"></div>
    
            </div>

        </div>
        
    </article>
    
    @endforelse

</section><!-- fin del div.posts.container -->

{{ $posts->appends(request()->all())->links() }}

@stop
