<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('plan_details')) {
            Schema::create('plan_details', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('plan_id')->unsigned();
                $table->integer('service_id')->unsigned();
                $table->string('title');
                $table->time('started_at');
                $table->time('end_at');
                $table->string('detail');
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
        Schema::dropIfExists('plan_details');
    }
}
