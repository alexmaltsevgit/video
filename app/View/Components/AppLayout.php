<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
//    public $token;
//    public $videos;
//
//    public function __construct($token, $videos)
//    {
//        $this->token = $token;
//        $this->videos = $videos;
//    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
