<?php

namespace Database\Seeders;

use App\Models\Rv\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    private $afdelingen = [
        'Wielertoeristen' => ['Groep 1', 'Groep 2', 'Groep 3', 'Groep 4', 'Groep 5'],
        'Voetbal Den Een' => [],
        'Voetbal Den Twee' => [],
        'Voetbal Den Drie' => [],
        'Voetbal Dames' => [],
        'Petanque' => [],
        'Kaarten' => [],
        'Biljarten' => [],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->afdelingen as $key => $value) {
            $afd = Department::factory()->create(['name' =>  $key]);

            foreach ($value as $group) {
                Department::factory()->create(['name' => $group, 'parent_id' => $afd->id]);
            }
        }
    }
}
