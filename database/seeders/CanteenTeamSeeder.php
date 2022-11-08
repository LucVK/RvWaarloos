<?php

namespace Database\Seeders;

use App\Models\Rv\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CanteenTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aa =Department::pluck('id')->toArray();
        $afdelingIds = Department::where('parent_id', null)->get()->pluck(['id'])->toArray(); // ->pluck(['id'])->toArray();

        foreach ($afdelingIds as $key => $value) {

            $algemeen = 'Algemeen-' . $value;
            DB::table('canteen_teams')->insert([
                'department_id' => $value,
                'name' => $algemeen,
                'isglobal' => true,
            ]);


            $aantalPloegen = random_int(4, 10);
            echo 'Seeding afdeling: ' . $value . ' aantal ploegen: ' . $aantalPloegen . PHP_EOL;

            for ($i = 0; $i < $aantalPloegen - 1; $i++) {
                $teamname = fake()->unique()->city(32);
                DB::table('canteen_teams')->insert([
                    'department_id' => $value,
                    'name' => $teamname,
                ]);
            }
        }
    }
}
