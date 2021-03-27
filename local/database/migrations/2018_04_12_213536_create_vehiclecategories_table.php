<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclecategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vehiclecategories', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('code')->unique();
            $table->string('type');
            $table->text('desc')->nullable();
            $table->boolean('is_enabled')->default(false);
            $table->softDeletes();
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
        //
        Schema::dropIfExists('vehiclecategories');
    }
}
