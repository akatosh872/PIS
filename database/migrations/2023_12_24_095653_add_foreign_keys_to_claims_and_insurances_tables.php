<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClaimsAndInsurancesTables extends Migration
{
    public function up()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->foreign('insurance_id')
                ->references('id')->on('insurances')
                ->nullable();
        });
    }

    public function down()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->dropForeign(['insurance_id']);
        });
    }
}
