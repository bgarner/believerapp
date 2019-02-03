<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationToBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->string('address1')->after('logo')->nullable();
            $table->string('address2')->after('address1')->nullable();
            $table->string('city')->after('address2')->nullable();
            $table->string('province')->after('city')->nullable();
            $table->string('postal_code')->after('province')->nullable();
            $table->string('phone1')->after('postal_code')->nullable();
            $table->string('phone2')->after('phone1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brands', function (Blueprint $table) {
            //
        });
    }
}
