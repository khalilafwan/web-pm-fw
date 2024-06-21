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
        Schema::create('DataMonitoring', function (Blueprint $table) {
            $table->id();
            $table->string('no_jo')->nullable();
            $table->date('tgl_jo')->nullable();
            $table->string('nama_project')->nullable();
            $table->string('kode_gbj')->nullable();
            $table->decimal('nilai_harga', 15, 2)->nullable();
            $table->string('nama_panel')->nullable();
            $table->string('tipe_jenis')->nullable();
            $table->string('tipe_fswm')->nullable();
            $table->integer('qty_unit')->nullable();
            $table->integer('qty_cell')->nullable();
            $table->string('warna')->nullable();
            $table->string('nomor_wo')->nullable();
            $table->string('nomor_seri')->nullable();
            $table->decimal('size_panel_height', 8, 2)->nullable();
            $table->decimal('size_panel_width', 8, 2)->nullable();
            $table->decimal('size_panel_deep', 8, 2)->nullable();
            $table->date('mh_std')->nullable();
            $table->date('mh_aktual')->nullable();
            $table->date('tgl_submit_dwg_for_approval')->nullable();
            $table->date('tgl_approved')->nullable();
            $table->date('tgl_release_dwg_softcopy')->nullable();
            $table->date('tgl_release_dwg_hardcopy')->nullable();
            $table->date('breakdown')->nullable();
            $table->date('busbar')->nullable();
            $table->date('target_ppc')->nullable();
            $table->date('target_eng')->nullable();
            $table->string('design_pic')->nullable();
            $table->date('design_start')->nullable();
            $table->date('design_end')->nullable();
            $table->string('nesting_pic')->nullable();
            $table->date('nesting_start')->nullable();
            $table->date('nesting_end')->nullable();
            $table->string('program_pic')->nullable();
            $table->date('program_start')->nullable();
            $table->date('program_end')->nullable();
            $table->string('checker_pic')->nullable();
            $table->date('checker_start')->nullable();
            $table->date('checker_end')->nullable();
            $table->date('tgl_box_selesai')->nullable();
            $table->date('due_date')->nullable();
            $table->date('tgl_terbit_wo')->nullable();
            $table->date('plan_start_produksi')->nullable();
            $table->date('aktual_start_produksi')->nullable();
            $table->date('plan_fg_wo')->nullable();
            $table->date('aktual_fg_wo')->nullable();
            $table->float('progress')->nullable();
            $table->text('desc_progress')->nullable();
            $table->string('status')->nullable();
            $table->integer('delivery_no')->nullable();
            $table->date('delivery_tgl')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DataMonitoring');
    }
};
