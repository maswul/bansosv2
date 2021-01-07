<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pokmas;
use Auth;

class PokmasInfo extends Component
{
    public $totalPokmas, $baru, $verifikasi, $survei,
        $nphd, $lpj;

    protected $listeners = ['pokmasInfoUpdates' => 'update'];


    public function mount()
    {
        $this->update();
    }

    public function update()
    {
        if (Auth::user()->role < 3)
        {
            $this->totalPokmas = Pokmas::get()->count();
            $this->verifikasi = Pokmas::where('status', '=', 0)->count();
            $this->verifikasi = Pokmas::where('status', '>', 0)->count();
            $this->survei = Pokmas::where('status', '>',1)->count();
            $this->nphd = Pokmas::where('status', '>',2)->count();
            $this->lpj = Pokmas::where('status', '>',3)->count();

        }else{
            $this->totalPokmas = Pokmas::where('user_id','=', Auth::user()->id)->count();
            $this->verifikasi = Pokmas::where('user_id','=', Auth::user()->id)->where('status', '=', 0)->count();
            $this->verifikasi = Pokmas::where('user_id','=', Auth::user()->id)->where('status', '>', 0)->count();
            $this->survei = Pokmas::where('user_id', '=', Auth::user()->id)->where('status', '>',1)->count();
            $this->nphd = Pokmas::where('user_id', '=', Auth::user()->id)->where('status', '>',2)->count();
            $this->lpj = Pokmas::where('user_id', '=', Auth::user()->id)->where('status', '>',3)->count();

        }
    }

    public function render()
    {
        return view('livewire.pokmas-info');
    }
}
