<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emp_salary', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('employee_id')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->double('basic_salary')->nullable();
            $table->double('bonus')->nullable();
            $table->double('bpjs')->nullable();
            $table->double('jp')->nullable();
            $table->double('loan')->nullable();
            $table->double('total_salary')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employee')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_salary');
    }
};
