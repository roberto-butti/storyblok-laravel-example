<?php


namespace App\View\Components;

use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class BlocksRenderer extends Component
{
    public $blocks;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($blocks)
    {
        $this->blocks = $blocks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // For _editable fileds, if have SSI enabled with nginx
        // you will receive
        // [an error occurred while processing the directive]
        // https://github.com/storyblok/storyblok/issues/290
        return <<<'blade'
        
        @foreach ($blocks as $b)
        @if (property_exists($b, "_editable"))
            {!! $b->_editable !!}
        @endif

        @if (is_array($b))
            <x-blocks-renderer :blocks="$b" />
        @else
            <x-dynamic-block :block="$b" />
        @endif
        @endforeach
blade;
    }
}
