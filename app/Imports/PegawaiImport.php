<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
//use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class PegawaiImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pegawai([
            //
            "nip" => $row['nip'],
            "nama" => $row['nama'],
            "pangkat" => $row['pangkat'],
            "gol" => $row['gol'],
            "jabatan" => $row['jabatan'],
        ]);
    }
    public function rules(): array
    {
        return [
            "nip" => "required|unique:pegawais",
            'nama' => 'required|unique:pegawais',
        ];
    }


}
