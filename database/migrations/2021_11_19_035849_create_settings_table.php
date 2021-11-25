<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->text('address')->nullable();
            $table->text('description');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('logo')->nullable();
            $table->string('fb_url')->default('#');
            $table->string('tw_url')->default('#');
            $table->string('ig_url')->default('#');
            $table->string('rh_url')->default('#');
            $table->string('footer_info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
