<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentTestController extends Controller
{
    //

    public function showComponent1()
    {
        $title = '春日';
        $image = 'アプス';
        $content = 'アパー';
        return view('tests.component-test1', compact('title', 'image', 'content'));
    }

    public function showComponent2()
    {
        return view('tests.component-test2');
    }
}
