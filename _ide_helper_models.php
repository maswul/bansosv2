<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Anggaran
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $tahun
 * @property int $pagu_dlm_daerah
 * @property int $pagu_luar_daerah
 * @property int $pagu_dlm_kota
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran wherePaguDlmDaerah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran wherePaguDlmKota($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran wherePaguLuarDaerah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggaran whereUpdatedAt($value)
 */
	class Anggaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pegawai
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $nip
 * @property string $nama
 * @property string|null $pangkat
 * @property string|null $gol
 * @property string|null $jabatan
 * @property string|null $profile_path
 * @property string|null $noHP
 * @property string|null $satuan_kerja
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Spt[] $Spt
 * @property-read int|null $spt_count
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereGol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereNoHP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai wherePangkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereProfilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereSatuanKerja($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereUpdatedAt($value)
 */
	class Pegawai extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pokmas
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $nama
 * @property string $desa
 * @property string $kec
 * @property string $kab
 * @property string $keg
 * @property int $user_id
 * @property string|null $user_name
 * @property int $status
 * @property string|null $status_ket
 * @property string|null $status_warna
 * @property int $pagu
 * @property string|null $kontak_nama
 * @property string|null $kontak_noHP
 * @property-read \App\Models\User $User
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereDesa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereKab($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereKec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereKeg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereKontakNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereKontakNoHP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas wherePagu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereStatusKet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereStatusWarna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pokmas whereUserName($value)
 */
	class Pokmas extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Spt
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $tgl_berangkat
 * @property string $tgl_kembali
 * @property int $lama_perjalanan
 * @property string $berangkat_dari
 * @property string $kota_tujuan
 * @property string $alat_angkut
 * @property string $dasar
 * @property string $kegiatan
 * @property string $pelaksana
 * @property int $pelaksana_id
 * @property string $pejabat_sppd
 * @property int $pejabat_sppd_id
 * @property string $pejabat_ppk
 * @property int $pejabat_ppk_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pegawai[] $Pegawai
 * @property-read int|null $pegawai_count
 * @method static \Illuminate\Database\Eloquent\Builder|Spt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spt query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spt whereAlatAngkut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt whereBerangkatDari($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt whereDasar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt whereKegiatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt whereKotaTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt whereLamaPerjalanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt wherePejabatPpk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt wherePejabatPpkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt wherePejabatSppd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt wherePejabatSppdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt wherePelaksana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt wherePelaksanaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt whereTglBerangkat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt whereTglKembali($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spt whereUpdatedAt($value)
 */
	class Spt extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $nip
 * @property string|null $noHP
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pokmas[] $Pokmas
 * @property-read int|null $pokmas_count
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoHP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

