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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('type')->nullable();
            $table->string('cab_id')->nullable();
            $table->string('package')->nullable();
            $table->string('plocation')->nullable();
            $table->string('dlocation')->nullable();
            $table->string('pdate')->nullable();
            $table->string('ptime')->nullable();
            $table->string('price')->nullable();
            $table->enum('status', ['1', '0', '2']);
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
        Schema::dropIfExists('bookings');
    }
};