<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function greetings($name = null)
    {
        return view('greeting', ['name' => $name]);
    }
}
