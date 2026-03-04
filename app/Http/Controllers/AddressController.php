<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    //kukunin yung data sa db for pampanga
    public function provinces(): JsonResponse
    {
        $rows = DB::table('provinces')
            ->orderBy('name')
            ->select('code', 'name')
            ->get();

        return response()->json($rows); //convert to json response or string para mahandle ng js
    }

    public function municipalities(string $provinceCode): JsonResponse
    {
        $rows = DB::table('municipalities')
            ->where('province_code', $provinceCode)
            ->orderBy('name')
            ->select('code', 'name')
            ->get();

        return response()->json($rows);
    }

    public function barangays(string $municipalityCode): JsonResponse
    {
        $rows = DB::table('barangays')
            ->where('municipality_code', $municipalityCode)
            ->orderBy('name')
            ->select('code', 'name')
            ->get();

        return response()->json($rows);
    }
}
