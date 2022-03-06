<section id="three" class="wrapper style3 special">
    <div class="inner">
        <header class="major">
            <h2>{{ $block->title }}</h2>
            <p>{{ $block->text }}</p>
        </header>
        <ul class="features">
            <x-blocks-renderer :blocks="$block->body" />
        </ul>
    </div>
</section>