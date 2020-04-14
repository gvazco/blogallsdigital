<div class="tags container-flex">

	@foreach($post->tags as $tag)

	<span class="tag c-gray-1 text-capitalize"><a href="{{ route('tags.show', $tag) }}">#{{ $tag->name }}</a></span>

	@endforeach

</div>