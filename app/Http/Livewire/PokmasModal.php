<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pokmas;
use App\Models\User;

class PokmasModal extends Component
{
    public $users, $nama, $desa, $kec, $kab, $keg,
        $user_id, $status, $pagu, $kontak_nama, $kontak_noHP;

    public $updateMode = false;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.pokmas-modal');
    }

    public function resetInput()
    {
        $this->nama = '';
        $this->desa = '';
        $this->kec = '';
        $this->kab = '';
        $this->keg = '';
        $this->user_id = '';
        $this->status = '';
        $this->pagu = '';
        $this->kontak_nama = '';
        $this->kontak_noHP = '';
    }
}
