<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Menu extends Component
{
    public $menus = [
        [
            'url'   => '/',
            'label' => 'Главная',
            'name'  => 'home',
        ],
        [
            'url'   => '/articles',
            'label' => 'Каталог ссылок',
            'name'  => 'articles',
        ]
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menus = null)
    {
        if ($menus) {
            $this->menus = $menus;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu');
    }
}
