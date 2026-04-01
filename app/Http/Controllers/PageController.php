<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function peta()
    {
        $data = [
            'title' => 'Peta',
        ];
        
        return view('map', $data);
    }

    public function tabel()
    {
        $data = [
            'title' => 'Tabel',
        ];
        
        return view('table', $data);
    }
}
