<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('services')) {
            Schema::create('services', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('category_id')->unsigned();
                $table->integer('province_id')->unsigned();
                $table->string('name');
                $table->string('description')->nullable()->default(null);
                $table->string('address')->nullable()->default(null);
                $table->string('open_time')->nullable()->default(null);
                $table->string('expected_price')->nullable()->default(null);
                $table->float('rate_average')->default(0);
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
        Schema::dropIfExists('services');
    }
}
