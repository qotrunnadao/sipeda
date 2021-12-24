<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
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
}
