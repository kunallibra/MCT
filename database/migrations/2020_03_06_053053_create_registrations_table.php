<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
              $table->bigIncrements('id');
              $table->string('fname');
              $table->string('lname');
              $table->date('dob');
              $table->date('enrolDate');
              $table->string('year');
              $table->string('hPhone');
              $table->string('mobile');
              $table->string('email');
              $table->string('f_conName');
              $table->string('f_conPhone');
              $table->string('s_conName');
              $table->string('s_conPhone');
              $table->string('photo');
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
        Schema::dropIfExists('registrations');
    }
}
