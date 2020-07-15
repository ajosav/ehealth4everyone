<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientDiagonsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_diagonses', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('patient_uuid')->index();
            $table->string('title');
            $table->string('diagnosed_by')->comment('doctor uuid');
            $table->longText('symptoms');
            $table->longText('diagnosis');
            $table->tinyInteger('status')->comment('0:suspected,1:active, 2:resolve');
            $table->timestamps();

            $table->softDeletes();


            $table->foreign('patient_uuid', 'diagnosed_by')->references('uuid')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_diagonses');
    }
}
