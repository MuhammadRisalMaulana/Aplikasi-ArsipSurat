<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index()
    {
        $data = [
            'nama'    => 'Muhammad Risal Maulana',
            'prodi'   => 'D3-MI PSDKU Pamekasan',
            'nim'     => '2231750003',
            'tanggal' => '03 Oktober 2025',
            'foto'    => asset('images/fotoprofil.png')
        ];

        return view('about', compact('data'));
    }
}
