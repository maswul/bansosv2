<?php

namespace App\Http\Livewire;

use App\Models\Anggaran;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class AnggaranTable extends TableComponent
{
    public $tahun, $pagu_dlm_daerah, $pagu_luar_daerah, $pagu_dlm_kota, $Anggaran_id;

    public $modeEdit = false;

    //? Ini untuk yang data tables
    public $header_view = 'sppd.master.header-anggaran';
    public $checkbox_side = 'left';
    public $checkbox = true;

    public function mount()
    {
        $this->init();
    }


    public function init()
    {
        $this->tahun = "";
        $this->pagu_dlm_daerah = 0;
        $this->pagu_dlm_kota = 0;
        $this->pagu_luar_daerah = 0;
        $this->Anggaran_id = "";
        $this->modeEdit = false;
    }

    public function query()
    {
        return Anggaran::query();
    }

    public function usrDeleteChecked()
    {

        Anggaran::whereIn('id', $this->checkbox_values)->delete();
        $this->notif('Data Anggaran berhasil dihapus!');
    }

    public function edit($id)
    {
        $ag = Anggaran::whereId($id)->first();
        $this->tahun = $ag->tahun;
        $this->Anggaran_id = $id;
        $this->pagu_dlm_daerah = $ag->pagu_dlm_daerah;
        $this->pagu_dlm_kota = $ag->pagu_dlm_kota;
        $this->pagu_luar_daerah = $ag->pagu_luar_daerah;
        $this->modeEdit = true;
        $this->emit("anggaranTambah", "show");
    }

    public function columns()
    {
        return [
            Column::make('Tahun')->sortable(),
            Column::make('Pagu Dalam Daerah', 'pagu_dlm_daerah')->view("sppd.master.anggaran.pagu-dlm-daerah")->sortable(),
            Column::make('Pagu Luar Daerah')->view("sppd.master.anggaran.pagu-luar-daerah")->sortable(),
            Column::make('Pagu Luar Kota', 'pagu_dlm_kota')->view("sppd.master.anggaran.pagu-dlm-kota")->sortable(),
            Column::make('Aksi')->view('sppd.master.aksi-pegawai')
        ];
    }

    public function tambahAnggaran()
    {
        $this->modeEdit = false;
        $this->emit("anggaranTambah", "show");
    }

    public function store()
    {
        //$this->notif($this->pagu_dlm_daerah);
        Anggaran::updateOrCreate(["id" => $this->Anggaran_id],
        [
            "tahun" => $this->tahun,
            "pagu_dlm_daerah" => $this->pagu_dlm_daerah,
            "pagu_luar_daerah" => $this->pagu_luar_daerah,
            "pagu_dlm_kota" => $this->pagu_dlm_kota,
        ]);

        if ($this->modeEdit)
        {
            $this->emit("anggaranTambah","hide");
            $this->notif("Data anggaran sudah diperbarui!");
        }else{
            $this->notif("Data anggaran baru sudah disimpan!");
        }
        $this->init();

    }

    protected function notif($text, $icon = "success")
    {
        $this->dispatchBrowserEvent('swal', [
            'title' => $text,
            'timer' => 3000,
            'icon' => $icon,
            'toast' => true,
            'timerProgressBar' => true,
            'position' => 'top-right',
            'showConfirmButton' => false,
        ]);
    }
}
