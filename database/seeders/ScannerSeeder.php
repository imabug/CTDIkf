<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScannerSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Scanners to seed the DB with
     * 
     * @var array $scanners
     */
    protected $scanners = [
        // Siemens
        1 => [
            'Naeotom Alpha',
            'Definition AS/AS+',
            'Somatom Flash',
            'Somatom Force',
            'Somatom Drive',
            'Definition Edge',
            'go.Top',
            'Confidence 64',
            'Confidence 20',
            'X.cite',
            'Biograph Vision',
            'Intevo Bold',
            'Symbia Pro.specta',
            'Pro.Pulse',
        ],
        2 => [
            // Neurologica
            'BodyTom',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->scanners as $manuf => $scanner) {
            foreach ($scanner as $s) {
                DB::table('scanners')->insert(
                    [
                        'manufacturer_id' => $manuf,
                        'scanner' => $s,
                    ]
                );
            }
        }
    }
}
