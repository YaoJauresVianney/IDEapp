<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('repairs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('wrecker_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('vehiclecategory_id')->unsigned();
            $table->integer('peopletype_id')->unsigned();
            $table->string('reference')->unique();
            $table->string('reasons');
            $table->date('date_getting');
            $table->string('place_getting');
            $table->string('hour_getting');
            $table->string('exchanger')->nullable();
            $table->string('counter')->nullable();
            $table->string('kms');
            $table->integer('kg')->default(0);
            $table->string('extension')->nullable();
            $table->string('charge')->nullable();
            $table->string('pc')->nullable();
            $table->string('scope')->nullable();
            $table->string('tvs_place')->nullable();
            $table->string('others')->nullable();
            $table->boolean('luggage')->default(false);
            $table->boolean('car_license')->default(false);
            $table->boolean('car_keys')->default(false);
            $table->string('car_brand');
            $table->string('car_imm');
            $table->string('state')->default('pending');
            $table->string('date_release')->nullable();
            $table->integer('total_amount')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('wrecker_id')->references('id')->on('wreckers');
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
        Schema::dropIfExists('repairs');
    }
}
