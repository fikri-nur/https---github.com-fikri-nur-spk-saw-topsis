<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criterias = [
            [
                'code'           => 'C1',
                'name'           => 'Pendidikan',
                'bobot'          => 0.36,
                'type'           => 'cost',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'C2',
                'name'           => 'Pekerjaan',
                'bobot'          => 0.2,
                'type'           => 'cost',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'C3',
                'name'           => 'Penghasilan',
                'bobot'          => 0.16,
                'type'           => 'cost',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'C4',
                'name'           => 'Status Perkawinan',
                'bobot'          => 0.08,
                'type'           => 'benefit',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'C5',
                'name'           => 'Umur',
                'bobot'          => 0.06,
                'type'           => 'benefit',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'C6',
                'name'           => 'Tempat Tinggal',
                'bobot'          => 0.06,
                'type'           => 'benefit',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'C7',
                'name'           => 'Kesehatan',
                'bobot'          => 0.04,
                'type'           => 'benefit',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'code'           => 'C8',
                'name'           => 'Jumlah Anak',
                'bobot'          => 0.03,
                'type'           => 'benefit',
                'created_at'     => now(),
                'updated_at'     => now(),
            ]
        ];

        Criteria::insert($criterias);
    }
}
