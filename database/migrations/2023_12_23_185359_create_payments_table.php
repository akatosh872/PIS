<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('card_number');
            $table->unsignedBigInteger('payment_system_id')->nullable();
            $table->foreign('payment_system_id')->references('id')->on('payment_systems');
            $table->unsignedBigInteger('insurance_id')->nullable();
            $table->foreign('insurance_id')->references('id')->on('insurances');
            $table->decimal('amount', 10, 2);
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
        Schema::dropIfExists('payments');
    }
}
