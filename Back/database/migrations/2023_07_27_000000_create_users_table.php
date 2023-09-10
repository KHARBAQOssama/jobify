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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('role')->nullable();
            $table->foreign('role')->references('id')->on('roles')->onDelete('cascade');
            $table->unsignedBigInteger('company')->nullable();
            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('employee')->nullable();
            $table->foreign('employee')->references('id')->on('employees')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
