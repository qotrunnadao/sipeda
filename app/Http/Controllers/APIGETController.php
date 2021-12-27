<?php

namespace App\Http\Controllers;

use App\Models\NilaiTA;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class APIGETController extends Controller
{
    public function nilaiTA()
    {
        $nilai_ta = NilaiTA::get();
        $response = [
            'message' => 'List Nilai Tugas Akhir',
            'data' => $nilai_ta
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
