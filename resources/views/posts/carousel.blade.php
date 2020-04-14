<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->

  <ol class="carousel-indicators">
    
    @foreach($post->photos as $photo)

    <li data-target="#carousel-example-generic" 
        data-slide-to="{{ $loop->index }}" 
        class="{{ $loop->first ? 'active' : '' }}">
    </li>

    @endforeach
  
  </ol>

  <div class="carousel-inner" role=listbox>

    @foreach ($post->photos as $photo)

      <div class="item {{ $loop->first ? 'active' : '' }}">
        
          <img src="{{ url($photo->url) }}">

      </div>

    @endforeach

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <i class="fas fa-angle-left"></i>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <i class="fas fa-angle-right"></i>
  </a>
</div>