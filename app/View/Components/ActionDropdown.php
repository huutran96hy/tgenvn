<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public ?string $editRoute;
    public string $deleteRoute;
    public int|string $id;

    public function __construct(string $deleteRoute, int|string $id, ?string $editRoute = null)
    {
        $this->editRoute = $editRoute;
        $this->deleteRoute = $deleteRoute;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action-cms');
    }
}
