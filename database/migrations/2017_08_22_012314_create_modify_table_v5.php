<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateModifyTableV5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function ($table) {
            $table->text('description')->change();
            $table->float('expected_price')->default(0)->change();
            $table->integer('comment')->nullable()->default(0);
            $table->string('phone')->nullable()->default(null);
            $table->float('rate_average')->nullable()->default(null)->change();
        });

        Schema::table('provinces', function ($table) {
            $table->text('description')->change();
        });

        Schema::table('plans', function ($table) {
            $table->dropColumn('time');
            $table->string('time_from')->nullable()->default(null);
            $table->string('time_to')->nullable()->default(null);
        });

        Schema::table('service_gallerys', function ($table) {
            $table->dropColumn('province_name');
            $table->dropColumn('pic_name');
        });

        Schema::table('comments', function ($table) {
            $table->text('content')->nullable()->default(null)->change();
            $table->text('title')->nullable()->default(null);
            $table->float('rate_point')->nullable()->default(0)->change();
        });

        Schema::table('comments', function ($table) {
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
        });

        Schema::table('users', function ($table) {
            $table->string('profile_pic')->default('profile_pic.png')->change();
        });

        Schema::dropIfExists('follows');

        Schema::table('users', function ($table) {
            $table->dropColumn('follower');
            $table->dropColumn('following');
        });

        Schema::table('requested_services', function ($table) {
            $table->string('phone')->nullable()->default(null);
            $table->string('profile_pic')->nullable()->default(null);
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
