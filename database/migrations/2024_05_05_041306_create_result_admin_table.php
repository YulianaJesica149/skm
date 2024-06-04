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
        Schema::create('result_admin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('respondent_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('service_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('question_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('option_id')->constrained()->cascadeOnUpdate();
            $table->string('saran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_admin');
    }
};
