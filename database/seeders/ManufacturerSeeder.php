<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturerSeeder extends Seeder
{
    use WithoutModelEvents;
    
    /**
     * Manufacturers to seed the DB width
     * 
     * @var array $manufacturers
     */
    protected $manufacturers = [
        'Siemens',
        'Neurologica',
    ];
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->manufacturers as $m) {
            DB::table('manufacturers')->insert([
                'manufacturer' => $m,
            ]);
        }
    }
}
