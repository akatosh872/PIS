<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimTable extends Migration
{
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('contact');
            $table->text('information');
            $table->string('service_type');
            $table->json('additional_fields')->nullable();
            $table->foreignId('status_id')->constrained();
            $table->foreignId('insurance_type_id')->nullable()->constrained();
            $table->unsignedBigInteger('insurance_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('claims');
    }
}
