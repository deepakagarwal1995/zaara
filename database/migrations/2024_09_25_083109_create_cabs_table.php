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
        Schema::create('cabs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('ac_cab')->nullable();
            $table->string('type')->nullable();
            $table->string('capacity')->nullable();
            $table->string('photo')->nullable();
            $table->decimal('km_charges', $precision = 8, $scale = 2);
            $table->decimal('allowance', $precision = 8, $scale = 2);
            $table->integer('status')->default(1)
                ->nullable()->comment('0 Not Active, 1 Active');
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
        Schema::dropIfExists('cabs');
    }
};
