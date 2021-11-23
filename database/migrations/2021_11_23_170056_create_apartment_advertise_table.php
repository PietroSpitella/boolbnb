<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentAdvertiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_advertise', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
            $table->unsignedBigInteger('apartment_id');
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');

            $table->unsignedBigInteger('advertise_id');
            $table->foreign('advertise_id')->references('id')->on('advertises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_advertise');
    }
}
