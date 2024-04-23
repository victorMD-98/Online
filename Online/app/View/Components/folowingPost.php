<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class folowingPost extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $key,
        public $post,
        public $user
    )
    {
        $this->post=$post;
        $this->key=$key;
        $this->user=$user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.folowing-post');
    }
}
