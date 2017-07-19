<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('name');
                $table->date('date_of_birth');
                $table->string('gender');
                $table->string('phone')->nullable()->default(null);
                $table->string('address')->nullable()->default(null);
                $table->string('self_describe')->nullable()->default(null);
                $table->integer('level')->default(0);
                $table->integer('follower')->default(0);
                $table->integer('following')->default(0);
                $table->rememberToken();
                $table->timestamps();
            });
        }
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
