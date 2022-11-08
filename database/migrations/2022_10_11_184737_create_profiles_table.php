<?php

use App\Models\Rv\ClubMember;
use App\Models\User;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('club_member_id');
            $table->foreign('club_member_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');


            $table->string('birthdate')->nullable();
            $table->string('streetandnumber')->nullable();
            $table->string('zipcode', 4)->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();

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
        Schema::dropIfExists('profiles');
    }
};
