<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class MenuComponente extends Component
{
    protected $menus = NULL;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = Menu::where('ativo', 1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('componentes.menu-componente', ['menus'=>$this->menus]);
    }
}
