<section>
    <div>Component --{{ $block->component }}-- not exists</div>
    @foreach($block as $key => $value)
        @if (isset($showDetails) and ($showDetails))
            <div>
                @if (is_scalar($value))
                    {{ $key }}: {{ $value }}
                @else
                    {{ $key }}: {{ gettype($value) }}
                @endif
            </div>
        @else
            {{ $key }};
        @endif
    @endforeach
</section>
