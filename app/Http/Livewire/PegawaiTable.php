<?php

namespace App\Http\Livewire;

use App\Models\Pegawai;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;
use Livewire\WithFileUploads;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class PegawaiTable extends TableComponent
{
    use WithFileUploads;

    public $table_class = 'table-hover table-striped';
    public $header_view = '';
    public $checkbox_side = 'left';
    public $checkbox = false;

    public $modeEdit = false;

    public $nip, $nama, $pangkat, $gol, $jabatan, $noHP, $satuan_kerja, $Pegawai_id;

    public $sort_attribute = 'nama';
    public $sort_direction = 'asc';

    public $noUrut = 0;

    //? Untuk file upload
    public $excel;

    protected $rules = [
        'nama' => 'required|unique:pegawais',
        'nip' => 'required|unique:pegawais',
        'pangkat' => 'required|min:4',
        'gol' => 'required|min:2',
        'jabatan' => 'required|min:4',

    ];


    public function query()
    {
        return Pegawai::query();
    }

    public function mount()
    {
        $this->setTableProperties();
        $this->cancel();
        $this->noUrut = 0;
        if (Auth::user()->role < 3) {
            $this->header_view = 'sppd.master.header-pegawai';
            $this->checkbox = true;
        }
    }

    public function cancel()
    {
        $this->Pegawai_id = '';
        $this->modeEdit = false;
        $this->nip = '';
        $this->nama = '';
        $this->pangkat = '';
        $this->gol = '';
        $this->jabatan = '';
        $this->noHP = '';
        $this->excel = '';
        $this->satuan_kerja = 'Bidang Air Minum dan PLP Dinas Perumahan Rakyat, Kawasan Permukiman dan Cipta Karya';
    }

    public function usrDeleteChecked()
    {

        Pegawai::whereIn('id', $this->checkbox_values)->delete();
        $this->notif('Data pegawai berhasil dihapus!');
    }

    //!2 fungsi untuk tambah daata
    public function tambahBaru()
    {
        $this->modeEdit = false;
        $this->resetErrorBag();
        $this->resetValidation();
        $this->cancel();
        $this->emit('pegawaiTambah', "show");
    }

    public function store()
    {

        if ($this->modeEdit) {
            Pegawai::whereId($this->Pegawai_id)
                ->update([
                    "nip" => $this->nip,
                    "nama" => $this->nama,
                    "pangkat" => $this->pangkat,
                    "gol"   => $this->gol,
                    "jabatan" => $this->jabatan,
                    "noHP" => $this->noHP,
                    "satuan_kerja" => $this->satuan_kerja,
                ]);
            $this->emit('pegawaiTambah', "hide");
            $this->notif('Data pegawai berhasil diperbarui!');
        } else {
            $this->validate();
            Pegawai::create([
                "nip" => $this->nip,
                "nama" => $this->nama,
                "pangkat" => $this->pangkat,
                "gol"   => $this->gol,
                "jabatan" => $this->jabatan,
                "noHP" => $this->noHP,
                "satuan_kerja" => $this->satuan_kerja,
            ]);
            $this->notif('Data pegawai baru berhasil disimpan!');
        }
        $this->cancel();
    }

    public function edit($id)
    {
        $query = Pegawai::whereId($id)->first();
        $this->Pegawai_id = $id;
        $this->nip = $query->nip;
        $this->nama = $query->nama;
        $this->pangkat = $query->pangkat;
        $this->gol = $query->gol;
        $this->jabatan = $query->jabatan;
        $this->noHP = $query->noHP;
        $this->satuan_kerja = $query->satuan_kerja;
        $this->modeEdit = True;
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('pegawaiTambah', "show");
    }

    public function columns()
    {
        if (Auth::user()->role < 3) {
            return [
                Column::make('Nama')->searchable()->sortable(),
                Column::make('NIP')->searchable()->sortable(),
                Column::make('Pangkat')->searchable()->sortable(),
                Column::make('Golongan', 'gol')->searchable()->sortable(),
                Column::make('Jabatan')->searchable()->sortable(),
                Column::make('')->view('sppd.master.aksi-pegawai'),
            ];
        }else{
            return [
                Column::make('Nama')->searchable()->sortable(),
                Column::make('NIP')->searchable()->sortable(),
                Column::make('Pangkat')->searchable()->sortable(),
                Column::make('Golongan', 'gol')->searchable()->sortable(),
                Column::make('Jabatan')->searchable()->sortable(),

            ];
        }
    }

    public function saveFiles()
    {
        $this->validate(['excel' => 'required|mimes:xls,xlsx']);
        //$this->excel->store('pegawai');
        try {
            Excel::import(new PegawaiImport, $this->excel->store('pegawai'));
            $this->notif("Impor data pegawai dari Excel berhasil!");
        }
        catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            foreach ($failures as $failure) {
                //$failure->row(); // row that went wrong
                //$failure->attribute(); // either heading key (if using heading row concern) or column index
                //$failure->errors(); // Actual error messages from Laravel validator
                //$failure->values(); // The values of the row that has failed.
            }
        }



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
