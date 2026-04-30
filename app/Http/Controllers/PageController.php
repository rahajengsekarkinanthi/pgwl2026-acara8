<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function peta()
    {
        $data = [
            'title' => 'Peta',
            'icon' => 'fa-regular fa-map'
        ];
        
        return view('map', $data);
    }

    public function tabel()
    {
        $data = [
            'title' => 'Tabel',
            'icon' => 'fa-solid fa-table'
        ];
        
        return view('table', $data);
    }
}
