<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriaRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_repairs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('criteria_id')->unsigned();
            $table->integer('repair_id')->unsigned();
            $table->boolean('yes')->default(false);
            $table->boolean('number')->default(0);
            $table->string('comments')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('criteria_id')->references('id')->on('criterias');
            $table->foreign('repair_id')->references('id')->on('repairs');
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
        Schema::dropIfExists('criteria_repairs');
    }
}
