<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.a-propos');
    }

    public function prepareStay()
    {
        return view('pages.preparer-mon-sejour');
    }

    public function dining()
    {
        return view('pages.restauration', [
            'dining' => config('le8.dining'),
        ]);
    }

    public function privacy()
    {
        return view('pages.politique-confidentialite');
    }

    public function cookies()
    {
        return view('pages.politique-cookies');
    }

    public function terms()
    {
        return view('pages.cgv');
    }
}
