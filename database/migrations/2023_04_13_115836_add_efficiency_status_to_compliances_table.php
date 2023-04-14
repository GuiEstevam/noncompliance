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
        Schema::table('compliances', function (Blueprint $table) {
            $table->integer('efficiency_status')->nullable();
            $table->text('efficiency_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compliances', function (Blueprint $table) {
            $table->integer('efficiency_status')->nullable();
            $table->text('efficiency_text')->nullable();
        });
    }
};
