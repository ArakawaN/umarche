<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TestClassBase extends Component
{
    /**
     * Create a new component instance.
     */

    public $classBaseMessege;
    public $defaultMessege;


    public function __construct($classBaseMessege, $defaultMessege = '初期値です')
    {
        //

        $this->classBaseMessege = $classBaseMessege;
        $this->defaultMessege = $defaultMessege;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tests.test-class-base');
    }
}
