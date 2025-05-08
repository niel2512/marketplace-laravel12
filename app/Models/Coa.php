<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coa extends Model
{

    protected $table = 'coa';
    // untuk melist kolom yang dapat diisi
    protected $fillable = [
        'kode_akun',
        'nama_akun',
        'header_akun',
    ];
}
