<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $list = ['Undangan','Pengumuman','Nota Dinas','Pemberitahuan'];
        foreach ($list as $nama) {
            Kategori::firstOrCreate(['nama'=>$nama]);
        }
    }
}
