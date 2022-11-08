<?php

use App\Models\Rv\CanteenTeam;
use App\Models\Rv\Department;
use App\Models\Rv\Season;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canteen_permanences', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Season::class)->constrained();
            $table->foreignIdFor(Department::class)->constrained();
            $table->foreignIdFor(CanteenTeam::class)->constrained();

            $table->date('date')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('canteen_permanences');
    }
};
