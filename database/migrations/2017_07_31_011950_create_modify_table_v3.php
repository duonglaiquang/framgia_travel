<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModifyTableV3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_pic')->nullable()->default(null);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->string('profile_pic')->nullable()->default(null);
        });

        Schema::table('service_gallerys', function (Blueprint $table) {
            $table->string('province_name')->nullable()->default(null);
            $table->string('pic_name')->nullable()->default(null);
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
