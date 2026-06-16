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
        Schema::create('kfactors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scanner_id')
                ->nullable(false)
                ->index()
                ->constrained('scanners')
                ->noActionOnUpdate()
                ->noActionOnDelete();
            $table->foreignId('manufacturer_id')
                ->nullable(false)
                ->index()
                ->constrained('manufacturers')
                ->noActionOnUpdate()
                ->noActionOnDelete();
            $table->unsignedTinyInteger('phantom_diameter')
                ->nullable(false)
                ->index();
            $table->string('shaped_filter', 20)
                ->nullable()
                ->index()
                ->comment('Shaping filter');
            $table->unsignedTinyInteger('kv')
                ->nullable(false)
                ->index();
            $table->string('spectral_filter', 10)
                ->nullable()
                ->index();
            $table->unsignedTinyInteger('coll_N')
                ->nullable(false)
                ->index()
                ->comment('Number of detector rows');
            $table->unsignedTinyInteger('coll_T')
                ->nullable(false)
                ->index()
                ->comment('Detector row width');
            $table->double('coll_width')
                ->unsigned()
                ->nullable(false)
                ->index()
                ->comment('Total collimated width (N*T)');
            $table->double('ctdi100_center')
                ->unsigned()
                ->nullable()
                ->comment('Center CTDI(100) measurement');
            $table->double('ctdi_w')
                ->unsigned()
                ->nullable()
                ->comment('CTDIw');
            $table->double('k_factor')
                ->unsigned()
                ->nullable()
                ->storedAs('ctdi_w/ctdi100_center')
                ->comment('Calculated k factor');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kfactors');
    }
};
