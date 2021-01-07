<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokmas extends Model
{
    use HasFactory;

    protected $fillable =[
        'nama',
        'desa',
        'kec',
        'kab',
        'keg',
        'pagu',
        'status',
        'kontak_nama',
        'kontak_noHP',
        'user_id',
        'status_ket',
        'user_name',
        'status_warna',
    ];

    public Function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
