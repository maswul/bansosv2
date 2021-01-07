<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SptView extends Component
{
    public $modeEdit = false;

    //Mode dataku
    public $tgl_berangkat, $tgl_kembali, $lama_perjalanan, $berangkat_dari,
        $kota_tujuan, $alat_angkut, $dasar, $kegiatan, $pelaksana, $pelaksana_id,
        $pejabat_sppd, $pejabat_sppd_id, $pejabat_ppk, $pejabat_ppk_id;

    public function resetFields()
    {
        $this->modeEdit =false;
    }

    public function buat()
    {
        $this->resetFields();
        $this->emit("sptTambah", "show");
    }

    public function render()
    {
        return view('livewire.spt-view');
    }
}
