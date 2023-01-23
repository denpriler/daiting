<?php

namespace App\View\Components\Controls;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchableSelect extends Component
{
    private string $route;
    private string $parameter;
    private bool   $translatable;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $route, string $parameter, bool $translatable = false)
    {
        $this->route = $route;
        $this->parameter = $parameter;
        $this->translatable = $translatable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.controls.searchable-select', [
            'route'        => $this->route,
            'parameter'    => $this->parameter,
            'translatable' => $this->translatable
        ]);
    }
}
