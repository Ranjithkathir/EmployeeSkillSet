<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('EmployeeId')->unsigned();
            $table->foreign('EmployeeId','fk_EmployeesId')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('SkillId')->unsigned();
            $table->foreign('SkillId','fk_SkillsId')->references('id')->on('skills')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('Rating');
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
        Schema::dropIfExists('employee_skills');
    }
}
