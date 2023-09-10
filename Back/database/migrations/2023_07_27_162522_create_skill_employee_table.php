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
        Schema::create('skill_employee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee');
            $table->foreign('employee')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('skill');
            $table->foreign('skill')->references('id')->on('skills')->onDelete('cascade');
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
        Schema::dropIfExists('skill_profile');
    }
};
