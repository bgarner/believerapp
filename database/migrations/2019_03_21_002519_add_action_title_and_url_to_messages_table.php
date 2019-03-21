<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActionTitleAndUrlToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->renameColumn('action', 'action_title');
            $table->string('action_url')->after('action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            //
        });
    }
}
