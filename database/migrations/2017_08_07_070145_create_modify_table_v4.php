<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifyTableV4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provinces', function (Blueprint $table) {
            $table->string('name')->nullable()->default(null)->change();
            $table->string('bg_url')->nullable()->default(null);
            $table->integer('hotel')->default(0);
            $table->integer('restaurant')->default(0);
            $table->integer('amusement')->default(0);
        });

        if (Schema::hasColumn('provinces', 'img_name'))
        {
            Schema::table('provinces', function (Blueprint $table)
            {
                $table->dropColumn('img_name');
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
        //
    }
}
