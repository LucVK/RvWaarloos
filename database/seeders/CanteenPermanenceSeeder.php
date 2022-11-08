<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\Models\Rv\CanteenTeam;
use App\Models\Rv\Department;
use App\Models\Rv\Season;

class CanteenPermanenceSeeder extends Seeder
{

    private function getDates(string $day, int $year)
    {
        $start = new DateTime(date("d-M-Y", strtotime("first " . $day . " " . $year - 1 . "-12-31")));
        $stop = new DateTime(date("d-M-Y", strtotime("last " . $day . " " . $year + 1 . "-01-01")));
        $stop->modify('+1 day');

        $period = new DatePeriod($start, new DateInterval('P7D'), $stop);
        return $period;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $afdelingIds = Department::all(['id'])->toArray();
        // $afdelingIds = Department::where('parent_id', null)->pluck(['id'])->toArray();
        $afdelingIds = Department::where('parent_id', null)->get()->toArray(); // ->pluck(['id'])->toArray();

        foreach (Season::all() as $jaargang) {
            echo 'Seeding jaargang: ' . $jaargang->year . PHP_EOL;

            $saturdays = $this->getDates("saturday",  $jaargang->year);
            $sundays = $this->getDates("sunday",  $jaargang->year);

            foreach (array_merge(iterator_to_array($saturdays),iterator_to_array($sundays)) as $key => $value) {
                $afdelingId =  $afdelingIds[array_rand($afdelingIds)]['id'];

                // $tapploeg = Tapploeg::where('isglobaal', true)
                // ->whereRelation('afdeling', 'id', $afdelingId)
                // ->whereRelation('jaargang', 'id', $jaargang->id)
                // ->first();

                $tapploegen = CanteenTeam::
                    whereRelation('department', 'id', $afdelingId)
                    // ->whereRelation('season', 'id', $jaargang->id)
                    ->get();

                $tapploeg = $tapploegen[rand(0, count($tapploegen)-1)];


                DB::table('canteen_permanences')->insert([
                    'department_id' => $afdelingId,
                    'season_id' => $jaargang->id,
                    'canteen_team_id' => $tapploeg->id,
                    'date' => $value->format('Y-m-d'),
                ]);
            }
        }
    }
}
