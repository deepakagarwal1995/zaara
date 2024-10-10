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
        Schema::create('local_cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cab_id'); // Foreign key
            $table->string('name')->nullable();
            $table->decimal('eight_hr', 10, 2);
            $table->decimal('twelve_hr', 10, 2);
            $table->decimal('extra_hr', 10, 2);
            $table->enum('status', ['1', '0']);
            $table->timestamps();

            // Define the foreign key constraint
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
        Schema::dropIfExists('local_cities');
    }
};
