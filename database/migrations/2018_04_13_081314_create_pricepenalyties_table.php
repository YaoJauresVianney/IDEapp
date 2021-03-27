<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricepenalytiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pricepenalyties', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('vehiclecategory_id')->unsigned();
            $table->integer('peopletype_id')->unsigned();
            $table->string('code')->unique();
            $table->integer('penality_per_day');
            $table->boolean('per_kg')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('vehiclecategory_id')->references('id')->on('vehiclecategories');
            $table->foreign('peopletype_id')->references('id')->on('peopletypes');
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
        Schema::dropIfExists('pricepenalyties');
    }
}
