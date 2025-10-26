<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    //kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
        'alamat'
    ];
}
