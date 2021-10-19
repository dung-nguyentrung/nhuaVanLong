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
            $table->string('description_vi');
            $table->string('description_en')->nullable();
            $table->string('description_jp')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('fax');
            $table->string('address_vi')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_jp')->nullable();
            $table->string('open_time');
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
