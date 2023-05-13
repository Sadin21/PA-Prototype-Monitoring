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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('status_in_family');
            $table->string('grade');
            $table->string('class');
            $table->string('school');
            $table->string('status_with_parents');
            $table->string('photo')->nullable();
            $table->string('regis_status');
            // $table->bigInteger('coordinator_id');
            $table->foreignId('coordinator_id')->constrained('users');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('child_parent_id')->constrained('child_parents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
