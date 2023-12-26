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
            $table->foreignId('claim_id')->constrained('claims');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('insurance_type_id')->constrained('insurance_types');
            $table->decimal('monthly_fee', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('installments')->default(0);
            $table->boolean('enable')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('insurances');
    }
}
