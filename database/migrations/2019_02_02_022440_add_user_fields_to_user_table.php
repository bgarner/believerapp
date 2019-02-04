<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserFieldsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first')->after('name')->nullable();
            $table->string('last')->after('first')->nullable();
            $table->integer('point_balance')->after('remember_token')->nullable();
            $table->string('social_accounts')->after('point_balance')->nullable();
            $table->integer('level')->after('social_accounts')->nullable();
            $table->string('address1')->after('level')->nullable();
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
        Schema::table('users', function (Blueprint $table) {

        });
    }
}
