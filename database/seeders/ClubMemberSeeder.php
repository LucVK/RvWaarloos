<?php

namespace Database\Seeders;

use App\Models\Rv\ClubMember;
use App\Models\Rv\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClubMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::factory(2000)->create();
    }
}
