<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index()
    {
        $data = [
            'nama'    => 'Yoppy Yunhasnawa',
            'prodi'   => 'D3-MI PSDKU Kediri',
            'nim'     => '7411040713',
            'tanggal' => '24 Oktober 2023',
            'foto'    => asset('images/foto-profil.png')
        ];

        return view('about', compact('data'));
    }
}
