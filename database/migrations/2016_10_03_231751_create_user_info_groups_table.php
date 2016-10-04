<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_type_id')->unsigned();
            $table->string('slug');
            $table->string('name');

            $table->timestamps();
        });

        Schema::table('user_info_groups', function (Blueprint $table) {
            $table->foreign('user_type_id')->references('id')->on('user_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_info_groups', function (Blueprint $table) {
            $table->dropForeign(['user_type_id']);
        });
        Schema::drop('user_info_groups');
    }
}
