<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $data = $this->data();

        return view('calendar.index', $data);
    }

    public function data()
    {
        return [
            'active' => 'calendar',
        ];
    }
}
