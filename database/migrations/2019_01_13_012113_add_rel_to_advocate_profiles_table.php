<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelToAdvocateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advocate_profiles', function (Blueprint $table) {
            $table->foreign('advocate_bulk_upload_id')->references('id')->on('advocate_bulk_uploads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advocate_profiles', function (Blueprint $table) {
            //
        });
    }
}
