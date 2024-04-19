<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modalPost extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $post,
        public $user,
        public $key
    )
    {
        $this->post=$post;
        $this->user=$user;
        $this->key=$key;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-post');
    }
}
