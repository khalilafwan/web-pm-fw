<?php
require_once 'header.php';
require_once 'query.php';
require_once 'crud-monitoring.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//cek apakah tombol sudah ditekan
if(isset($_POST['submit']))
{
    $fileName = $_FILES['excel_data']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    $file_ext = strtolower($file_ext);

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['excel_data']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $id = $row[0]
                $no_jo = $row[1]; 
                $tgl_jo = $row[2]; 
                $nama_project = $row[3];
                $kode_gbj = $row[4];
                $nilai_harga = $row[5]; 
                $nama_panel = $row[6]; 
                $tipe_jenis = $row[7];
                $tipe_fswm = $row[8];
                $qty_unit = $row[9];
                $qty_cell = $row[10];
                $warna = $row[11];
                $nomor_wo = $row[12];
                $nomor_seri = $row[13];
                $size_panel_height = $row[14]; 
                $size_panel_width = $row[15]; 
                $size_panel_deep = $row[16];
                $mh_std = $row[17];
                $mh_aktual = $row[18];
                $tgl_submit_dwg_for_approval = $row[19];
                $tgl_approved = $row[20];
                $tgl_release_dwg_softcopy = $row[21];
                $tgl_release_dwg_hardcopy = $row[22];
                $breakdown = $row[23];
                $busbar = $row[24];
                $target_ppc = $row[25];
                $target_eng = $row[26];
                $design_pic = $row[27];
                $design_start = $row[28];
                $design_end = $row[29];
                $nesting_pic = $row[30];
                $nesting_start = $row[31];
                $nesting_end = $row[32];
                $program_pic = $row[33];
                $program_start = $row[34];
                $program_end = $row[35];
                $checker_pic = $row[36];
                $checker_start = $row[37];
                $checker_end = $row[38];
                $tgl_box_selesai = $row[39];
                $due_date = $row[40];
                $tgl_terbit_wo = $row[41];
                $plan_start_produksi = $row[42];
                $aktual_start_produksi = $row[43];
                $plan_fg_wo = $row[44];
                $aktual_fg_wo = $row[45];
                $progress = $row[46];
                $desc_progress = $row[47];
                $status = $row[48];
                $delivery_no = $row[49];
                $delivery_tgl = $row[50];
                $keterangan = $row[51];

                $query = "INSERT INTO data_monitoring
                (id,no_jo,tgl_jo,nama_project,kode_gbj,
                nilai_harga,nama_panel,tipe_jenis,tipe_fswm,qty_unit,
                qty_cell,warna,nomor_wo,nomor_seri,size_panel_height,
                size_panel_width,size_panel_deep,mh_std,mh_aktual,tgl_submit_dwg_for_approval,
                tgl_approved,tgl_release_dwg_softcopy,tgl_release_dwg_hardcopy,breakdown,busbar,
                target_ppc,target_eng,design_pic,design_start,design_end,
                nesting_pic,nesting_start,nesting_end,program_pic,program_start,
                program_end,checker_pic,checker_start,checker_end,tgl_box_selesai,
                due_date,tgl_terbit_wo,plan_start_produksi,aktual_start_produksi,plan_fg_wo,
                aktual_fg_wo,progress,desc_progress,status,delivery_no,
                delivery_tgl,keterangan)
                VALUES
                ('$id','$no_jo', '$tgl_jo', '$nama_project', '$kode_gbj',
                 '$nilai_harga', '$nama_panel', '$tipe_jenis', '$tipe_fswm', '$qty_unit',
                 '$qty_cell', '$warna', '$nomor_wo', '$nomor_seri', '$size_panel_height',
                 '$size_panel_width', '$size_panel_deep', '$mh_std', '$mh_aktual', '$tgl_submit_dwg_for_approval',
                 '$tgl_approved', '$tgl_release_dwg_softcopy', '$tgl_release_dwg_hardcopy', '$breakdown', '$busbar',
                 '$target_ppc', '$target_eng', '$design_pic', '$design_start', '$design_end',
                 '$nesting_pic', '$nesting_start', '$nesting_end', '$program_pic', '$program_start',
                 '$program_end', '$checker_pic', '$checker_start', '$checker_end', '$tgl_box_selesai',
                 '$due_date', '$tgl_terbit_wo', '$plan_start_produksi', '$aktual_start_produksi', '$plan_fg_wo',
                 '$aktual_fg_wo', '$progress', '$desc_progress', '$status', '$delivery_no',
                 '$delivery_tgl', '$keterangan')";                
                $result = mysqli_query($conn, $query); 
                $msg = True;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: datamonitoring.store');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: monitoring.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: ');
        exit(0);
    }
}
?>