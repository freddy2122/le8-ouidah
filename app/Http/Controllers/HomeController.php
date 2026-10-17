<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $tents = collect(config('le8.tents'))->take(3);

        return view('home', [
            'tents' => $tents,
        ]);
    }
}
