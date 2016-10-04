<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTableAddColumnTypeId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('type_id')->unsigned()->after('id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('user_types');
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
            $table->dropForeign(['type_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('type_id');
        });
    }
}
