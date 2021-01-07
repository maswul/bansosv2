<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokmas;
use App\Models\User;
use Auth;
use View;

class PokmasC extends Controller
{
    //
    public $totalPokmas, $baru, $verifikasi, $survei,
        $nphd, $lpj;

    public function __construct()
    {

        //View::share('totalPokmas', $this->totalPokmas);
    }
    public function main()
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
        $arr = [
            'totalPokmas' => $this->totalPokmas,
            'baru' => $this->baru,
            'verifikasi' => $this->verifikasi,
            'survei' => $this->survei,
            'nphd'  => $this->nphd,
            'lpj'   => $this->lpj,
        ];
        return view('bansos.uang', $arr);
    }

}
