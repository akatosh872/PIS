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
            $table->integer('user_id');
            $table->string('contact');
            $table->text('information');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('insurance_type_id')->nullable();
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('insurance_type_id')->references('id')->on('insurance_types');
        });
    }

    public function down()
    {
        Schema::dropIfExists('claims');
    }
}
