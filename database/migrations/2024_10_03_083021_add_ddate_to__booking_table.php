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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('ddate')->nullable();
            $table->string('payment')->nullable();
            $table->string('pay_type')->nullable();
            $table->enum('pay_status', ['paid', 'unpaid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('ddate');
            $table->dropColumn('payment');
            $table->dropColumn('pay_type');
            $table->dropColumn('pay_status');

            //
        });
    }
};