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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cab_id'); // Foreign key
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('license')->nullable();
            $table->string('city')->nullable();
            $table->string('registration')->nullable();
            $table->string('year')->nullable();
            $table->string('lisence_exp')->nullable();
            $table->string('license_img')->nullable();
            $table->string('registration_img')->nullable();
            $table->string('insuranse_img')->nullable();
            $table->enum('status', ['1', '0']);
            $table->timestamps();



            $table->foreign('cab_id')->references('id')->on('cabs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
};
