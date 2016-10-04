<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_info_group_id')->unsigned();
            $table->string('slug');
            $table->string('name');
            $table->integer('field_type_id');
            $table->timestamps();
        });

        Schema::table('user_info_fields', function (Blueprint $table) {
            $table->foreign('user_info_group_id')->references('id')->on('user_info_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_info_fields', function (Blueprint $table) {
            $table->dropForeign(['user_info_group_id']);
        });
        Schema::drop('user_info_fields');
    }
}
