<?php

namespace App\View\Components;

use Illuminate\View\Component;

use Illuminate\Support\Facades\Log;


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
        
        $bladeComponent = $this->block->component ?? '';
        Log::debug(__METHOD__ . $bladeComponent);
        if ($bladeComponent === "") {
            
        }
        try {
            $string = view("components.blocks." . $bladeComponent, [
                "block" => $this->block,
            ])->render();

            return <<<blade
 
                {$string}
            
            blade;
        } catch (\Exception $e) {
            return "Error rendering components, " . $e->getMessage();
        }
    }
}
