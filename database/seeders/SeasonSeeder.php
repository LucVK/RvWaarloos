<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonSeeder extends Seeder
{
    private $jaargangen = [
        2015,2016,2017,2018,2019,2020,2021,2022
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->jaargangen as $jaargang) {
            DB::table('seasons')->insert([
                'year' => $jaargang,
                'login_grace_days' => rand(10,50),
                'payment_reminder_days' => rand(12,20),
            ]);
        }
    }
}
