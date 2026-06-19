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
        Schema::create('scanners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')
                ->nullable(false)
                ->index()
                ->constrained('manufacturers')
                ->noActionOnUpdate()
                ->noActionOnDelete();
            $table->string('scanner', 50)
                ->nullable(false)
                ->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scanners');
    }
};
