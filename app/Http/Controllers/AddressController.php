<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function provinces(): JsonResponse
    {
        $rows = DB::table('provinces')
            ->orderBy('name')
            ->select('code', 'name')
            ->get();

        return response()->json($rows);
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
