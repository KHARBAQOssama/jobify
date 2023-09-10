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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->unique();
            $table->string('last_name')->unique();
            $table->date('birthday');
            $table->text('summary')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('image')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('resume')->nullable();
            $table->unsignedBigInteger('contact_information')->nullable();
            $table->foreign('contact_information')->references('id')->on('contact_information')->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
};
