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
            $table->unsignedBigInteger('dealings_owner')->nullable();
            $table->foreign('dealings_owner')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compliances', function (Blueprint $table) {
            $table->dropForeign(['dealings_owner'])->nullable();
            $table->dropColumn('dealings_owner');
        });
    }
};
