<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlocksRenderer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public array $blocks
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
        @foreach ($blocks as $b)
        @if (is_array($b))
            <x-blocks-renderer :blocks="$b->body" />
        @else
            <x-dynamic-block :block="$b" />
        @endif
        @endforeach
blade;
    }
}
