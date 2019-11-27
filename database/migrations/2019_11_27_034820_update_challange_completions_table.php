<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateChallangeCompletionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('challenge_completions', function (Blueprint $table) {
            $table->string('challenge_name')->nullable()->after('user_id');
            $table->text('challenge_content')->nullable()->after('user_id');
            $table->unsignedInteger('challenge_type')->nullable()->after('user_id');
            $table->unsignedInteger('brand_id')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
