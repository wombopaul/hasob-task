<?php

namespace Hasob\FoundationCore\View\Components;

use Illuminate\View\Component;

class CommentEntry extends Component
{

    public $commentable;

    public function __construct($commentableObject)
    {
        $this->commentable = $commentableObject;
    }
    
    public function render(){

        return view('hasob-foundation-core::components.comment-entry');

    }

}