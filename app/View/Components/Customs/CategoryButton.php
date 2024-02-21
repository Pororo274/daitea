<?php

namespace App\View\Components\Customs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $isActive,
        public string $link
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.customs.category-button');
    }
}
