<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    /**
     *  чтоб неавторизованным попасть на /home отключаем стороку 14ть
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
}
