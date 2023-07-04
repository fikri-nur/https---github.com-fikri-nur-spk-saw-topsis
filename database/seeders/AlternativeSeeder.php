<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Seeder;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alternatives = [
            [
                'code'           => 'A1',
                'name'           => 'Cipta Ningsih',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'A2',
                'name'           => 'Firnawati',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'A3',
                'name'           => 'Misroriah',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'A4',
                'name'           => 'Soleha',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'A5',
                'name'           => 'Kemala Sar',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'A6',
                'name'           => 'Nafsiah',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'A7',
                'name'           => 'Suparmi',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'A8',
                'name'           => 'Astuti',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            
        ];

        Alternative::insert($alternatives);
    }
}
