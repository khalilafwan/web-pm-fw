<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKonsesi extends Model
{
    use HasFactory;

    protected $table = 'data_konsesi'; 
    protected $fillable = [
        'id_konsesi', 'jo', 'wo', 'nama_project', 'nama_panel', 'unit', 
        'jenis', 'no_rpb', 'no_po', 'kode_material', 'konsesi', 'jumlah', 
        'no_lkpj', 'status', 'tgl_matrial_dtg', 'tgl_pasang', 'keterangan'
    ];

    public $timestamps = true;
}
