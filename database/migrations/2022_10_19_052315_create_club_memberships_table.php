<?php

use App\Models\Rv\CanteenTeam;
use App\Models\Rv\ClubMember;
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
        Schema::create('club_memberships', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('club_member_id');
            $table->foreign('club_member_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignIdFor(Season::class)->constrained();
            $table->foreignIdFor(Department::class)->constrained();
            $table->foreignIdFor(CanteenTeam::class)->constrained();

            $table->integer('status')->default(0);
            $table->string('marking')->nullable();


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
        Schema::dropIfExists('club_memberships');
    }
};
