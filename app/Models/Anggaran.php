<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    use HasFactory;

    protected $fillable = [
        "tahun",
        "pagu_dlm_daerah",
        "pagu_luar_daerah",
        "pagu_dlm_kota",
    ];
}
