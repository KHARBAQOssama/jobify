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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');    
            $table->text('description')->nullable();
            $table->json('qualifications')->nullable();
            $table->json('benefits')->nullable();
            $table->date('ends_in')->nullable();
            $table->integer('minimum_salary')->nullable();
            $table->integer('maximum_salary')->nullable();
            $table->string('frequency')->nullable();
            $table->string('currency')->nullable();
            $table->integer('applying_capacity')->nullable();
            $table->unsignedBigInteger('company');
            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('job_level');
            $table->foreign('job_level')->references('id')->on('job_levels')->onDelete('cascade');
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('employment_type');
            $table->foreign('employment_type')->references('id')->on('employment_types')->onDelete('cascade');
            $table->unsignedBigInteger('education_attainment_id');
            $table->foreign('education_attainment_id')->references('id')->on('education_attainments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
