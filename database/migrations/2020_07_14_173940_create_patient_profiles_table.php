<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('patient_uuid')->index();
            $table->string('title');
            $table->string('sex', 50);
            $table->string('marital_status', 50)->nullable();
            $table->string('blood_type', 50)->nullable();
            $table->string('blood_group',50)->nullable();
            $table->string('genotype', 50)->nullable();
            $table->string('height', 50)->nullable();
            $table->string('bmi', 50)->nullable();
            $table->string('bp', 50)->nullable();
            $table->string('weight', 50)->nullable();
            $table->string('vision', 50)->nullable();
            $table->string('Hearing', 50)->nullable();
            $table->string('allergies', 50)->nullable();
            $table->string('oxygen_sat', 50)->nullable();
            $table->boolean('alchohol')->nullable();
            $table->boolean('drug')->nullable();
            $table->boolean('millitary')->nullable();
            $table->boolean('blood_transfusion')->nullable();
            $table->boolean('ulcer')->nullable();
            $table->tinyInteger('tobacco_use')->nullable()->comment('0:never, 1:till_date, 2:before');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patient_uuid')->references('uuid')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_profiles');
    }
}
