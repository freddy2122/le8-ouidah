<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentController extends Controller
{
    public function index()
    {
        $tents = collect(config('le8.tents'));

        return view('tentes.index', [
            'tents' => $tents,
        ]);
    }

    public function show(string $locale, string $tent)
    {
        $data = collect(config('le8.tents'))->firstWhere('slug', $tent);

        abort_if($data === null, 404);

        return view('tentes.show', [
            'tent' => $data,
        ]);
    }
}
