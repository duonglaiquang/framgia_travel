<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestedServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('requested_services')) {
            Schema::create('requested_services', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->integer('category_id')->unsigned();
                $table->integer('province_id')->unsigned();
                $table->string('name');
                $table->time('description')->nullable();
                $table->string('address')->nullable();
                $table->string('open_time')->nullable();
                $table->string('expected_price')->nullable();
                $table->string('status');
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
        Schema::dropIfExists('requested_services');
    }
}
