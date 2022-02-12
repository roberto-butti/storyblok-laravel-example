<div class="card w-96 bg-base-100 shadow-xl">
  <!-- 400x225 -->
  <figure><img src="{{$block->picture->filename}}/m/400x225/filters:grayscale()" alt="Shoes"></figure>
  <div class="card-body">
    <h2 class="card-title">{{ $block->text }}</h2>
    <p>{{ $block->caption_title }}</p>
    <div class="card-actions justify-end">
    {{ $block->caption_text }}
      
    </div>
  </div>
</div>

