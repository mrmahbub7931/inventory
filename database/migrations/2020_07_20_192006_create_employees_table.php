<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_slug');
            $table->string('email');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('age')->nullable();
            $table->string('birth_date');
            $table->string('hired_date')->nullable();
            $table->string('national_id')->nullable();
            $table->string('designation');
            $table->string('department_name');
            $table->string('experience')->nullable();
            $table->string('salary');
            $table->string('yearly_holiday');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
