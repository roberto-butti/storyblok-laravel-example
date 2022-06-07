<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Log;

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
        $bladeComponent = $this->block->component ?? '';
        Log::debug(__METHOD__ . $bladeComponent);
        if ($bladeComponent === "") {
        }

        try {
            return view("components.blocks." . $bladeComponent, [
                "block" => $this->block,
            ])->render();
            /*
                        return <<<blade

                            {$string}

                        blade;
            */
        } catch (\Exception $e) {
            return view("components.blocks.no_component", [
                "block" => $this->block,
            ])->render();
            /*
            return <<<blade
{$string}
blade;
*/
        }
    }
}
