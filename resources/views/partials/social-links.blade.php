  <div class="buttons-social-media-share">
    <ul class="share-buttons">
      	<li>
      		<a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&title={{ $post->title }}" 
      		title="Compartir en Facebook" 
      		target="_blank">
      			<img alt="Share on Facebook" src="/img/flat_web_icon_set/Facebook.png">
      		</a>
      	</li>

      	<li>
      		<a href="https://twitter.com/intent/tweet?source={{ request()->fullUrl() }}&text={{ $post->title }}&via={{config('app.name')}}&hashtags=AllsDigital" 
      		target="_blank" 
      		title="Tweet">
      			<img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png">
      		</a>
      	</li>
      	<li>
      		<a href="https://www.linkedin.com/shareArticle?mini=true&url={{ request()->fullUrl() }}&title={{ $post->title }}&summary={{ $post->excerpt }}&source={AllsDigital}" 
      		target="_blank" 
      		title="Compartir en Linkedin">
      			<img alt="Link" src="/img/flat_web_icon_set/Linkedin.png">
      		</a>
      	</li>

      	<li>
      		<a href="http://pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&description={{ $post->title }}" 
      		target="_blank" 
      		title="Pin it">
      			<img alt="Pin it" src="/img/flat_web_icon_set/Pinterest.png">
      		</a>
      	</li>
    </ul>
  </div>