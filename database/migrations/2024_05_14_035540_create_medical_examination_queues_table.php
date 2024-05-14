<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalExaminationQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_examination_queues', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('gender');
            $table->string('examination_type');
            $table->text('examination_notes')->nullable();
            $table->string('patient_type');
            $table->dateTime('examination_datetime'); // Tambahkan kolom examination_datetime
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_examination_queues');
    }
}
