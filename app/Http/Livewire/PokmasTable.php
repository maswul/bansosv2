<?php

namespace App\Http\Livewire;

use App\Models\Pokmas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class PokmasTable extends TableComponent
{
    public $table_class = 'table-hover table-striped';
    //public $checkbox = false;
    public $checkbox_side = 'left';
    public $checkbox_attribute = 'id';

    public $header_view = 'pokmas.table-header';

    public $users, $nama, $desa, $kec, $kab, $keg,
        $user_id, $status, $status_ket, $user_name, $pagu, $kontak_nama, $kontak_noHP;

    public $updateMode = false;
    public $per_page = 10;
    public $sort_direction = 'asc';

    public $isModal = false;

    protected $rules = [
        'nama' => 'required|unique:pokmas',
        'desa' => 'required|min:4',
        'kec' => 'required|min:4',
        'kab' => 'required|min:4',
        'keg' => 'required|min:5',
        'pagu' => 'required|integer',
    ];


    public function query()
    {
        if (Auth::user()->role < 3) {
            return Pokmas::with('User');
        } else {
            return Pokmas::whereUserId(Auth::user()->id);
        }
    }

    //! fungsi Modal
    public function openModal()
    {
        $this->isModal = true;
        $this->emit('pokmasDetail', "show");
    }

    //! fungsi untuk closeModal
    public function closeModal()
    {
        $this->isModal = false;
        $this->emit('pokmasDetail', "hide");
        $this->resetInput();
    }

    public function detail($id)
    {
        $this->openModal();
        //! Reset data
        $this->resetInput();
        //? Inisisasi data
        $this->nama = Pokmas::whereId($id)->first()->nama;
    }

    public function mount()
    {
        $this->setTableProperties();
        $this->status = '0';
        $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        $this->users = User::all();
        return $this->tableView();
    }

    public function cancel()
    {
        $this->resetInput();
    }

    public function usrDeleteChecked()
    {
        $this->emit('pokmasInfoUpdates');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Data Pokmas Berhasil dihapus!',
            'timer' => 3000,
            'icon' => 'success',
            'toast' => true,
            'timerProgressBar' => true,
            'position' => 'top-right',
            'showConfirmButton' => false,
        ]);
        Pokmas::whereIn('id', $this->checkbox_values)->delete();
    }

    public function resetInput()
    {
        $this->nama = '';
        $this->desa = '';
        $this->kec = '';
        $this->kab = '';
        $this->keg = '';
        $this->user_id = Auth::user()->id;
        $this->status = '0'; //0 = new, 1 = verifikasi ... 4 = lpj
        $this->pagu = '';
        $this->kontak_nama = '';
        $this->kontak_noHP = '';
        $this->isModal = false;
        $this->status_ket = '';
        $this->user_name = '';
    }
    //! Ini fungsi untuk nyimpan data
    public function simpanData()
    {
        $this->validate();
        Pokmas::create([
            'nama' => $this->nama,
            'desa' => $this->desa,
            'kec' => $this->kec,
            'kab' => $this->kab,
            'keg' => $this->keg,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'pagu' => $this->pagu,
            'kontak_noHP' => $this->kontak_noHP,
            'kontak_nama' => $this->kontak_nama,
            'status_ket' => $this->ket_status_by_id($this->status),
            'status_warna' => $this->warna_status_by_id($this->status),
            'user_name' => User::whereId($this->user_id)->first()->name,
        ]);
        $this->emit('pokmasInfoUpdates');
        session()->flash('message', 'Tambah pokmas berhasil');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Pokmas ' . $this->nama . ' Berhasil disimpan',
            'timer' => 3000,
            'icon' => 'success',
            'toast' => true,
            'timerProgressBar' => true,
            'position' => 'top-right',
            'showConfirmButton' => false,
        ]);
        $this->resetInput();
        $this->emit('pokmasSimpan');
    }

    public function columns()
    {
        if (Auth::user()->role < 3) {
            return [
                //Column::make('', 'status')->view('pokmas.render-status')->sortable(),
                //Column::make('ID')->searchable()->sortable(),
                Column::make('Status', 'status_ket')->view('pokmas.render-status'),
                Column::make("Verifikator", 'user_name')->sortable()->searchable(),
                Column::make('Pokmas', 'nama')->searchable()->sortable(),
                Column::make('Desa', 'desa')->searchable()->sortable(),
                Column::make('Kecamatan', 'kec')->searchable()->sortable(),
                Column::make('Kabupaten', 'kab')->searchable()->sortable(),
                Column::make('Kegiatan', 'keg')->searchable()->sortable(),
                Column::make('Pagu')->view('pokmas.render-pagu')->searchable(),
                Column::make('Pegawai', 'User'),

            ];
        } else {
            return [
                Column::make()->view('pokmas.render-status')->searchable(),
                Column::make('ID')->searchable()->sortable(),
                //Column::make("Verifikator")->view('pokmas.render-user')->searchable()->sortable(),
                Column::make('Pokmas', 'nama')->searchable()->sortable(),
                Column::make('Desa', 'desa')->searchable()->sortable(),
                Column::make('Kecamatan', 'kec')->searchable()->sortable(),
                Column::make('Kabupaten', 'kab')->searchable()->sortable(),
                Column::make('Kegiatan', 'keg')->searchable()->sortable(),
                Column::make('Pagu')->view('pokmas.render-pagu')->searchable(),
            ];
        }
    }

    protected function ket_status_by_id($id)
    {
        switch ($id) {
            case 0:
                return "Baru";
                break;

            case 1:
                return "Verifikasi";
                break;
            case 2:
                return "Survei";
                break;
            case 3:
                return "NPHD";
                break;
            case 4:
                return "LPJ";
                break;
        }
    }

    protected function warna_status_by_id($id)
    {
        switch ($id) {
            case 0:
                return "primary";
                break;

            case 1:
                return "warning";
                break;
            case 2:
                return "info";
                break;
            case 3:
                return "success";
                break;
            case 4:
                return "danger";
                break;
        }
    }
}
