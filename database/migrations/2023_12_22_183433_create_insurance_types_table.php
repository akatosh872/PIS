<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceTypesTable extends Migration
{
    public function up()
    {
        Schema::create('insurance_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('additional_fields')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('insurance_types');
    }
}
