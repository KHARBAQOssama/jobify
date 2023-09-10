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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('course');
            $table->string('school');
            $table->boolean('graduated');
            $table->string('from');
            $table->string('to')->nullable();
            $table->text('description')->nullable();
            $table->string('media')->nullable();
            $table->unsignedBigInteger('employee');
            $table->foreign('employee')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('education_attainment');
            $table->foreign('education_attainment')->references('id')->on('education_attainments')->onDelete('cascade');
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
        Schema::dropIfExists('education');
    }
};
