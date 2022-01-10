<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Akademik;
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
		])->get('https://soa.unsoed.ac.id/sia-sandbox/v1/mahasiswa/profil?nim=H1D018036');
		$mhs = json_decode($mhs_json, true);
		$mhs_data = $mhs["data"];
        // dd($mhs_data);
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
                    $mhs->angkatan = $value["tahunangkatan"];
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
					if($simpan){
                        // dd($mhs->id);
                        $akademik = new Akademik;
                        $akademik->angkatan = $value["tahunangkatan"];
                        $akademik->mhs_id = $mhs->id;
				    	$simpan = $akademik->save();
                }
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

	public function looping(Request $request)
	{

		/* API url*/
		$baseurl = 'https://soa.unsoed.ac.id/sia-sandbox/v1/dosen/profil?emailunsoed=acep@unsoed.ac.id';

		$kodefak = array("H");
		$data = array();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		/* when ever I have to use curl to an ssl host I always include these options */
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla-whatever-ua-string');
		curl_setopt($ch, CURLOPT_CAINFO, realpath('c:/cacert.pem'));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);


		/* Assign parameter values here */
		foreach ($kodefak as $kodefak) {
			$api_key = 'hVCK2D4V25rPEN8yIf9Qbf7XeNQcEYoqSckyl83J';
			$secretkey = 'Utb6T3g';
			$fak_id = $kodefak;

			/* $_GET Parameters to Send */
			$params = array(
				'X-API-KEY'             =>   $api_key,
				'secretkey'             => $secretkey,
				'kodefak'              =>   $kodefak,
			);

			/* Update URL to container Query String of Paramaters */
			$url = $baseurl . '?' . http_build_query($params);

			curl_setopt($ch, CURLOPT_URL, $url);
			$curl_response = curl_exec($ch);

			$decoded = json_decode($curl_response, true);

			/* store all responses for later consumption */
			$data[] = $curl_response;
			/* for debug, show responses */
			echo '<pre>', json_encode($decoded, JSON_PRETTY_PRINT), '</pre>';
		}

		curl_close($ch);

		if (!empty($data)) print_r($data);
	}

	public function curl($nim)
	{
		/* API url*/
		$baseurl = 'https://soa.unsoed.ac.id/sia-sandbox/v1/mahasiswa/profil?nim=' . $nim;
		$headers = array(
			'X-API-KEY:hVCK2D4V25rPEN8yIf9Qbf7XeNQcEYoqSckyl83J',
			'secretkey:Utb6T3g'
		);
		$ch = curl_init($baseurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$data = curl_exec($ch);
		curl_close($ch);
		$hasil = json_decode($data);
		if (empty($hasil->status)) {
			$response = array("status" => "no_response", "info" => "Gagal akses");
		} elseif ($hasil->status == 200) {
			$response = array("status" => $hasil->status, "info" => $hasil->message, "data_response" => $hasil->data);
		} else {
			$response = array("status" => $hasil->status, "info" => $hasil->message);
		}

		return $response;
	}

	public function data_mhs($nim)
	{
		/* API url*/
		$baseurl = 'https://soa.unsoed.ac.id/sia-sandbox/v1/mahasiswa/profil?nim=' . $nim;
		$headers = array(
			'X-API-KEY:hVCK2D4V25rPEN8yIf9Qbf7XeNQcEYoqSckyl83J',
			'secretkey:Utb6T3g'
		);
		$ch = curl_init($baseurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$data = curl_exec($ch);
		curl_close($ch);
		$hasil = json_decode($data);
		if (empty($hasil->status)) {
			$response = array("status" => "no_response", "info" => "Gagal akses");
		} elseif ($hasil->status == 200) {
			$response = array("status" => $hasil->status, "info" => $hasil->message, "data_response" => $hasil->data);
		} else {
			$response = array("status" => $hasil->status, "info" => $hasil->message);
		}

		if ($hasil['status'] == '200') {
			$data[$nim] = array(
				'nim' => $hasil['data_response'][0]->nim,
				'nama' => $hasil['data_response'][0]->namamhs,
				'tglLahir' => $hasil['data_response'][0]->tgllhrmhs,
				'nohp' => $hasil['data_response'][0]->nohp,
				'angkatan' => $hasil['data_response'][0]->tahunangkatan,
			);
			$check = Mahasiswa::get_by_id($nim);
			if (empty($check)) {
				Mahasiswa::insert($data[$nim]);
			}
		};
	}
}
