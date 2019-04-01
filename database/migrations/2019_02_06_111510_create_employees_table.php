<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('EmployeeNumber');
            $table->string('Name')->default('');
            $table->string('Email')->default('');
            $table->bigInteger('MobileNumber')->nullable();
            $table->integer('Designation')->unsigned()->default('1');
            $table->foreign('Designation','fk_DesignationId')->references('id')->on('designations')->onUpdate('cascade')->onDelete('cascade');
            $table->date('DateOfJoin')->nullable();
            $table->string('password');
            $table->string('remember_token');
            $table->integer('CreatedBy')->nullable();
            $table->timestamps();   
            $table->integer('IsDeleted')->default('0');
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
