<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->unsignedInteger('level')->default(0);
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('admins')->insert([
            'name' => 'Mouna Mabrouk',
            'email' => 'mouna@admin.com',
            'password' => '$10$nAdYhQY/ai8glbK34eHN7.w5fGSjl4yiJJ0BRXzKa.fs4Xe6p9CDC',
            'level' => 3
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
