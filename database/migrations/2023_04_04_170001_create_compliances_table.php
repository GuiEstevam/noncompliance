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
        Schema::create('compliances', function (Blueprint $table) {
            $table->id();
            $table->integer('registeredBy');
            $table->date('compliance_date');
            $table->integer('classification');
            $table->integer('client');
            $table->text('non_compliance');
            $table->text('instant_action');
            $table->integer('responsable_departament');
            $table->integer('right_action')->nullable();
            $table->integer('dealings_owner')->nullable();
            $table->integer('action_time')->nullable();
            $table->date('effiency_check')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compliances');
    }
};
