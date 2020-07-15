<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('doctor_uuid')->index();
            $table->string('department_id')->index();
            $table->string('title');
            $table->string('license_no')->nullable();
            $table->string('specialiazation');
            $table->string('certificates')->nullable();
            $table->string('position', 30);
            $table->string('visitation_charge', 30);
            $table->string('experience');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('doctor_uuid')->references('uuid')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_profiles');
    }
}
