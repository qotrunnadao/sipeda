<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class APISIAController extends Controller
{
    public function Index()
    {
        // ====== API DOSEN ========
        $dosen_json = Http::withHeaders([
            'X-API-KEY' => 'hVCK2D4V25rPEN8yIf9Qbf7XeNQcEYoqSckyl83J',
            'secretkey' => 'Utb6T3g',
        ])->get('https://soa.unsoed.ac.id/sia-sandbox/v1/dosen/profil?emailunsoed=acep@unsoed.ac.id');
        $dosen = json_decode($dosen_json, true);
        $dosen_data = $dosen["data"];

        // ====== API MAHASISWA ========
        $mhs_json = Http::withHeaders([
            'X-API-KEY' => 'hVCK2D4V25rPEN8yIf9Qbf7XeNQcEYoqSckyl83J',
            'secretkey' => 'Utb6T3g',
        ])->get('https://soa.unsoed.ac.id/sia-sandbox/v1/mahasiswa/profil?nim=F1F014059');
        $mhs = json_decode($mhs_json, true);
        $mhs_data = $mhs["data"];

        // ====== API KOMPONEN NILAI ========
        $komponen = Http::withHeaders([
            'X-API-KEY' => 'hVCK2D4V25rPEN8yIf9Qbf7XeNQcEYoqSckyl83J',
            'secretkey' => 'Utb6T3g',
        ])->get('https://soa.unsoed.ac.id/sia-sandbox/v1/matakuliah/komponenpenilaian');

        return view('admin.master.data_api', compact('dosen_data', 'mhs_data', 'komponen'));
    }

    public function store(Request $request)
    {
        // ====== API MAHASISWA ========
        $mhs_json = Http::withHeaders([
            'X-API-KEY' => 'hVCK2D4V25rPEN8yIf9Qbf7XeNQcEYoqSckyl83J',
            'secretkey' => 'Utb6T3g',
        ])->get('https://soa.unsoed.ac.id/sia-sandbox/v1/mahasiswa/profil?nim=H1D018006');
        $mhs = json_decode($mhs_json, true);
        $mhs_data = $mhs["data"];

        // ====== API DOSEN ========
        $dosen_json = Http::withHeaders([
            'X-API-KEY' => 'hVCK2D4V25rPEN8yIf9Qbf7XeNQcEYoqSckyl83J',
            'secretkey' => 'Utb6T3g',
        ])->get('https://soa.unsoed.ac.id/sia-sandbox/v1/dosen/profil?emailunsoed=acep@unsoed.ac.id');
        $dosen = json_decode($dosen_json, true);
        $dosen_data = $dosen["data"];
        // dd($dosen_data);
        // foreach($dosen_data as $value){
        // Penyimpanan Dosen
        if ($dosen_data) {
            $user = new User;
            $user->email = $dosen_data["email_unsoed"];
            $user->level_id = '3';
            $simpan = $user->save();
            if ($simpan) {
                $dosen = new Dosen;
                $dosen->nama = $dosen_data["nama"];
                $dosen->nip = $dosen_data["nip"];
                $dosen->user_id = $user->id;
                if ($dosen_data["namaprogstudi"] == 'Teknik Elektro') {
                    $dosen->jurusan_id = '1';
                } elseif ($dosen_data["namaprogstudi"] == 'Teknik Sipil') {
                    $dosen->jurusan_id = '2';
                } elseif ($dosen_data["namaprogstudi"] == 'Teknik Geologi') {
                    $dosen->jurusan_id = '3';
                } elseif ($dosen_data["namaprogstudi"] == 'Informatika') {
                    $dosen->jurusan_id = '4';
                } elseif ($dosen_data["namaprogstudi"] == 'Teknik Industri') {
                    $dosen->jurusan_id = '5';
                }
                $simpan = $dosen->save();
            } else {
                Alert::warning('Gagal', 'Data User Dosen Gagal Ditambahkan');
                return back();
            }
        } else {
            Alert::warning('Gagal', 'Data User Dosen Gagal Ditambahkan');
            return back();
        }
        // Penyimpanan Mahasiswa
        foreach ($mhs_data as $value) {
            if (
                $value["namaprogdikti"] == 'Teknik Elektro' || $value["namaprogdikti"] == 'Teknik Sipil'
                || $value["namaprogdikti"] == 'Teknik Geologi' || $value["namaprogdikti"] == 'Informatika'
                || $value["namaprogdikti"] == 'Teknik Industri'
            ) {
                $user = new User;
                $user->email = $value["namamhs"];
                $user->level_id = '4';
                $simpan = $user->save();
                if ($simpan) {
                    $mhs = new Mahasiswa;
                    $mhs->alamat = $value["alamatasalmhs"];
                    $mhs->nohp = $value["nohp"];
                    $mhs->tglLahir = $value["tgllhrmhs"];
                    $mhs->nama = $value["namamhs"];
                    $mhs->nim = $value["nim"];
                    $mhs->user_id = $user->id;

                    if ($value["namajeniskelamin"] == 'LAKI-LAKI') {
                        $mhs->jk_id = '1';
                    } elseif ($value["namajeniskelamin"] == 'PEREMPUAN') {
                        $mhs->jk_id = '2';
                    } else {
                        Alert::warning('Gagal', 'Data User Mahasiswa Gagal Ditambahkan');
                        return back();
                    }

                    if ($value["namaprogdikti"] == 'Teknik Elektro') {
                        $mhs->jurusan_id = '1';
                    } elseif ($value["namaprogdikti"] == 'Teknik Sipil') {
                        $mhs->jurusan_id = '2';
                    } elseif ($value["namaprogdikti"] == 'Teknik Geologi') {
                        $mhs->jurusan_id = '3';
                    } elseif ($value["namaprogdikti"] == 'Informatika') {
                        $mhs->jurusan_id = '4';
                    } elseif ($value["namaprogdikti"] == 'Informatika') {
                        $mhs->jurusan_id = '5';
                    } else {
                        Alert::warning('Gagal', 'Data User Mahasiswa Gagal Ditambahkan');
                        return back();
                    }

                    $simpan = $mhs->save();
                    if ($simpan == true) {
                        Alert::success('Berhasil', 'Data  User Mahasiswa dan Dosen berhasil Ditambahkan');
                    } else {
                        Alert::warning('Gagal', 'Data  User Mahasiswa Gagal Ditambahkan');
                    }
                    return back();
                } else {
                    Alert::warning('Gagal', 'Data User Mahasiswa Gagal Ditambahkan');
                    return back();
                }
            } else {
                Alert::warning('Gagal', 'Data User Mahasiswa Gagal Ditambahkan');
                return back();
            }
        }
    }
}
