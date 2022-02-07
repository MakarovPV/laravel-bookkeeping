<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaughterIncomeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daughter_income_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');

            $table->string('source_of_income');
            $table->integer('price')->default('0');

            $table->softDeletes();
            
            $table->foreign('parent_id')->references('id')->on('income_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daughter_income_categories');
    }
}
