<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DynamicBlock extends Component
{
    public $block;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($block)
    {
        $this->block = $block;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $bladeComponent = $this->block->component;
        // implode(",", array_keys(get_object_vars($this->block)));
        try {
            $string = view("components.blocks." . $bladeComponent, [
                "block" => $this->block,
            ])->render();

            return <<<blade
            <div class="border-2 border-rose-600">
                {$string}
            </div>
            blade;
        } catch (\Exception $e) {
            return "Error rendering components, " . $e->getMessage();
        }
    }
}
