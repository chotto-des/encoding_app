<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    private const DATA_DIR = __DIR__ . '/../data/address';
    private const CHUNK    = 500;
    
    public function run(): void
    {
        $provinces      = json_decode(file_get_contents(self::DATA_DIR . '/provinces.json'),      true); 
        $municipalities = json_decode(file_get_contents(self::DATA_DIR . '/municipalities.json'), true);
        $barangays      = json_decode(file_get_contents(self::DATA_DIR . '/barangays.json'),      true);

        collect($provinces)->sortBy('name')->chunk(self::CHUNK)->each(
            fn($chunk) => DB::table('provinces')->insert(
                $chunk->map(fn($p) => ['code' => $p['code'], 'name' => $p['name']])->values()->all()
            )
        );

        collect($municipalities)->sortBy('name')->chunk(self::CHUNK)->each(
            fn($chunk) => DB::table('municipalities')->insert(
                $chunk->map(fn($m) => [
                    'code'          => $m['code'],
                    'name'          => $m['name'],
                    'province_code' => $m['provinceCode'] ?? '',
                ])->values()->all()
            )
        );

        collect($barangays)->sortBy('name')->chunk(self::CHUNK)->each(
            fn($chunk) => DB::table('barangays')->insert(
                $chunk->map(fn($b) => [
                    'code'              => $b['code'],
                    'name'              => $b['name'],
                    'municipality_code' => $b['cityCode'] ?: ($b['municipalityCode'] ?: ''),
                ])->values()->all()
            )
        );
    }
}
