<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('follows', function ($table) {
            $table->foreign('follower_id')->references('id')->on('users');
            $table->foreign('following_id')->references('id')->on('users');
        });

        Schema::table('user_gallerys', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('services', function ($table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('province_id')->references('id')->on('provinces');
        });

        Schema::table('service_gallerys', function ($table) {
            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::table('comments', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::table('plans', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('plan_locations', function ($table) {
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('plan_id')->references('id')->on('plans');
        });

        Schema::table('plan_details', function ($table) {
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::table('requested_services', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('province_id')->references('id')->on('provinces');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('follows', function ($table) {
            $table->dropForeign(['follower_id']);
            $table->dropForeign(['following_id']);
        });

        Schema::table('user_gallerys', function ($table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('services', function ($table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['province_id']);
        });

        Schema::table('service_gallerys', function ($table) {
            $table->dropForeign(['service_id']);
        });

        Schema::table('comments', function ($table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['service_id']);
        });

        Schema::table('plans', function ($table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('plan_locations', function ($table) {
            $table->dropForeign(['province_id']);
            $table->dropForeign(['plan_id']);
        });

        Schema::table('plan_details', function ($table) {
            $table->dropForeign(['plan_id']);
            $table->dropForeign(['service_id']);
        });

        Schema::table('requested_services', function ($table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['province_id']);
        });
    }
}
