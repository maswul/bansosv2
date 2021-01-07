<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        "nip",
        "nama",
        "pangkat",
        "gol",
        "jabatan",
        "profile_path",
        "noHP",
        "satuan_kerja",
    ];

    public function Spt()
    {
        return $this->hasMany("App\Models\Spt");
    }
}
