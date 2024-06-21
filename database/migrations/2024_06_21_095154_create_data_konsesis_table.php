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
        Schema::create('DataKonsesi', function (Blueprint $table) {
            $table->id();
            $table->string('jo')->nullable();
            $table->string('wo')->nullable();
            $table->string('nama_project')->nullable();
            $table->string('nama_panel')->nullable();
            $table->integer('unit')->nullable();
            $table->string('jenis')->nullable();
            $table->integer('no_rpb')->nullable();
            $table->integer('no_po')->nullable();
            $table->string('kode_material')->nullable();
            $table->string('konsesi')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('no_lkpj')->nullable();
            $table->string('status')->nullable();
            $table->date('tgl_matrial_dtg')->nullable();
            $table->date('tgl_pasang')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DataKonsesi');
    }
};
