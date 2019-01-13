<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelToNpsEmailReceiptList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nps_email_receipt_list', function (Blueprint $table) {
            $table->foreign('email_id')->references('id')->on('nps_emails');
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
        Schema::table('nps_email_receipt_list', function (Blueprint $table) {
            //
        });
    }
}
