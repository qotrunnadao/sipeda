<?php

namespace App\Http\Controllers;

use App\Models\NilaiTA;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class APIPOSTController extends Controller
{
    public function nilaiTA(Request $request)
    {
        // Versi 1
        $validator = Validator::make($request->all(), [
            "ta_id" => "required",
            "statusnilai_id" => "required",
            "nilai_huruf_id" => "required",
            "nilaiAngka" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $nilaiTA = NilaiTA::create($request->all());
            $response = [
                "message" => "Berhasil tambah nilai TA",
                "data" => $nilaiTA
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json(
                [
                    "message" => "Gagal tambah nilai TA" . $e->errorInfo,
                ]
            );
        }
        // Versi 2
        // $nilaiTA = new NilaiTA;
        // $nilaiTA->ta_id = $request->ta_id;
        // $nilaiTA->statusnilai_id = $request->statusnilai_id;
        // $nilaiTA->nilai_huruf_id = $request->nilai_huruf_id;
        // $nilaiTA->nilaiAngka = $request->nilaiAngka;
        // $nilaiTA->ket = $request->ket;
        // $result = $nilaiTA->save();
        // if ($result) {
        //     return ["Result" => "Berhasil Tambah Nilai TA"];
        // } else {
        //     return ["Result" => "Gagal tambah data nilai TA"];
        // }
    }
}
