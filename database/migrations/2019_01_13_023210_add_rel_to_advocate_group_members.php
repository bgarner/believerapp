<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelToAdvocateGroupMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advocate_group_members', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('advocate_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advocate_group_members', function (Blueprint $table) {
            //
        });
    }
}
