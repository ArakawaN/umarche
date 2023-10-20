<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleController extends Controller
{
    //

    public function showServiveProvider()
    {

        // $encrypt = app()->make('encrypter');
        // $password = $encrypt->enctypt('password');

        // $sample = app()->make('serviceProviderTest');

        // dd($sample, $password, $encrypt->decrypt($password));
    }

    public function showServiveContainer()
    {

        app()->bind('lifeCycleTest', function () {
            return 'ライフサイクル';
        });

        $test = app()->make('lifeCycleTest');

        dd($test, app());
    }
}
