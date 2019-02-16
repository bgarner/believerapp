<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_manager', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('brands');
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_manager');
    }
}
