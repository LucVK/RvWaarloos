<?php

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
        Schema::create('canteen_teams', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Department::class)->constrained();

            $table->string('name',32)->unique();
            $table->boolean('isglobal')->default(false);

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
        Schema::dropIfExists('canteen_teams');
    }
};
