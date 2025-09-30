<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Arsip extends Model
{
    protected $table = 'arsip';
        protected $fillable = ['nomor_surat','kategori_id','judul','lokasi_file'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function urlFile()
    {
        return Storage::url($this->lokasi_file);
    }
}
