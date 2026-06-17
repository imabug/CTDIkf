<?php

namespace Database\Seeders;

use App\Models\Kfactor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use SplFileObject;

class KFactorSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the kfactors table from a CSV file
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $csv = new SplFileObject('database/data/kfactors.csv', 'r');
        $csv->setFlags(SplFileObject::READ_CSV);
        $csv->seek(1); // Skip the header line

        while ($csv->valid()) {
            $row = $csv->current();
            if (is_null($row[0])) {
                break;
            }
            Kfactor::create([
                'scanner' => $row[1],
                'manufacturer' => $row[2],
                'phantom_diameter' => $row[3],
                'shaped_filter' => $row[4],
                'kv' => $row[5],
                'spectral_filter' => $row[6],
                'coll_N' => $row[7],
                'coll_T' => $row[8],
                'coll_width' => $row[9],
                'ctdi100_center' => $row[10],
                'ctdi_w' => $row[11],
            ]);  
            $csv->next();
        }

        Schema::enableForeignKeyConstraints();
    }
}
