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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->boolean('current');
            $table->string('from');
            $table->string('to')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('work_experience')->nullable();
            $table->foreign('work_experience')->references('id')->on('work_experiences')->onDelete('cascade');
            $table->unsignedBigInteger('education')->nullable();
            $table->foreign('education')->references('id')->on('education')->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
};
