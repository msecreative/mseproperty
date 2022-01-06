<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_bn');

            $table->string('featured_image');
            
            $table->unsignedBigInteger('location_id');

            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('sale')->default(1)->comment('rent=1, sale=2');
            $table->unsignedBigInteger('type')->default(1)->comment('land=1, appartment=2, villa=3');
            $table->unsignedBigInteger('bedrooms')->nullable();
            $table->unsignedBigInteger('drawing_rooms')->nullable();
            $table->unsignedBigInteger('kitchens')->nullable();

            $table->unsignedBigInteger('bathrooms')->nullable();
            $table->unsignedBigInteger('net_sqm')->nullable();
            $table->unsignedBigInteger('gross_sqm')->nullable();
            $table->unsignedBigInteger('pool')->nullable()->comment('1=no,2=private,3=public,4=both');

            $table->string('overview');
            $table->string('overview_bn');

            $table->longText('why_buy')->nullable();
            $table->longText('why_buy_bn')->nullable();

            $table->longText('description');
            $table->longText('description_bn');
            $table->timestamps();

            //$table->foreign('featured_media_id')->references('id')->on('media');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

  /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
