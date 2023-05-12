<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('compliances', function (Blueprint $table) {
            $table->id();
            $table->date('compliance_date');
            $table->text('non_compliance');
            $table->text('instant_action');
            $table->integer('responsable_departament');
            $table->text('right_action')->nullable();
            $table->integer('dealings_owner')->nullable();
            $table->integer('action_time')->nullable();
            $table->date('efficiency_check')->nullable();
            $table->integer('status')->nullable()->default('1');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE compliances AUTO_INCREMENT = 1578;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compliances');
    }
};
