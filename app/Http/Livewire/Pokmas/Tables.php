<?php

namespace App\Http\Livewire\Pokmas;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use App\Models\Pokmas;
use Mediconesystems\LivewireDatatables\Column;

class Tables extends LivewireDatatable
{
    public function builder()
    {
        //
        return Pokmas::query();
    }

    public function columns()
    {
        //
        return [
            Column::name('nama')->searchable(),
            Column::name('keg')->searchable(),
        ];
    }
}
