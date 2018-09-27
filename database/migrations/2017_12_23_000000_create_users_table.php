<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik')->unique();
            $table->string('name');
            $table->string('ava');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('telp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('bio')->nullable();
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('statuses');
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('tr_data_job_descs');
            $table->integer('posisition_id')->unsigned()->nullable();
            $table->foreign('posisition_id')->references('id')->on('tr_data_posisitions');
            $table->integer('province_id')->unsigned()->nullable();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('district_id')->unsigned()->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->rememberToken();
            $table->timestamps();
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
        Schema::dropIfExists('users');
    }
}
