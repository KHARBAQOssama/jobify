<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expected_salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('minimum');
            $table->integer('maximum');
            $table->string('currency');
            $table->string('frequency');
            $table->unsignedBigInteger('employee');
            $table->foreign('employee')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('expected_salaries');
    }
};
