<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelToChallengeAudiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('challenge_audiences', function (Blueprint $table) {
            $table->foreign('challenge_id')->references('id')->on('challenges');
            $table->foreign('advocate_profile_id')->references('id')->on('advocate_profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('challenge_audiences', function (Blueprint $table) {
            //
        });
    }
}
