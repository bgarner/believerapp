<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelToAdvocateBulkUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advocate_bulk_uploads', function (Blueprint $table) {
            //$table->foreign('user_id_uploader')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advocate_bulk_uploads', function (Blueprint $table) {
            //
        });
    }
}
