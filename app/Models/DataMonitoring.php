<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMonitoring extends Model
{
    use HasFactory;

    protected $table = 'data_monitoring';
    public static function getTotalPendapatan()
    {
        return self::sum('nilai_harga');
    }

    protected $fillable = [
        'id','no_jo','tgl_jo','nama_project','kode_gbj','nilai_harga','nama_panel','tipe_jenis','tipe_fswm','qty_unit','qty_cell',
        'nomor_wo','nomor_seri','warna','size_panel_height','size_panel_width','size_panel_deep','mh_std','mh_aktual',
        'tgl_submit_dwg_for_approval', 'tgl_approved','tgl_release_dwg_softcopy','tgl_release_dwg_hardcopy','breakdown','busbar',
        'target_ppc','target_eng','design_pic','design_start','design_end','nesting_pic','nesting_start','nesting_end','program_pic','program_start','program_end','checker_pic','checker_start','checker_end','tgl_box_selesai','due_date','tgl_terbit_wo','plan_start_produksi','aktual_start_produksi',
        'plan_fg_wo','aktual_fg_wo','progress','desc_progress','status','delivery_no','delivery_tgl','keterangan'
    ];

    public $timestamps = true;
}
