<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('claim_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('insurance_type_id');
            $table->decimal('monthly_fee', 10, 2); // Щомісячний внесок
            $table->date('start_date'); // Дата початку дії полісу
            $table->date('end_date'); // Дата закінчення дії полісу
            $table->integer('installments')->default(0); // Кількість внесків
            $table->boolean('enable')->default(false);
            $table->timestamps();

            $table->foreign('claim_id')->references('id')->on('claims')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('insurance_type_id')->references('id')->on('insurance_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('insurances');
    }
}
