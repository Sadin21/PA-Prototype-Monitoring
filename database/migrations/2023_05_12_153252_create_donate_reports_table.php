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
        Schema::create('donate_reports', function (Blueprint $table) {
            $table->id();
            $table->string('nominal');
            $table->string('status');
            $table->string('date');
            $table->string('file');
            $table->bigInteger('child_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donate_reports');
    }
};
