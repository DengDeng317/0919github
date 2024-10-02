<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $data = $this->data();

        return view('home.index', $data);
    }

    public function data()
    {
        return [
            'active' => 'home',
        ];
    }
}
