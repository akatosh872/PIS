<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('client_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('claim_id');
            $table->foreign('claim_id')->references('id')->on('claims')->onDelete('cascade');
            $table->string('file_path');
            $table->string('document_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client_documents');
    }
}
