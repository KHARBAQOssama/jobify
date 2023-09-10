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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('company_name');
            $table->boolean('current');
            $table->string('from');
            $table->string('to')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('employee');
            $table->foreign('employee')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('company');
            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('work_experiences');
    }
};
