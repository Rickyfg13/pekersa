<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CetakLaporanController extends Controller
{
    public function tampil()
    {
        $laporan = DB::table('laporan')
        ->leftjoin('user as a', 'laporan.id_pelapor', 'a.id_user')
       ->leftjoin('user as b', 'laporan.id_teknisi', 'b.id_user')
        ->leftjoin('jenis', 'laporan.id_jenis', 'jenis.id_jenis')
        ->select('laporan.*', 'a.nama as a_nama', 'jenis.*', 'b.nama as b_nama')
        ->get();

        return $laporan;
    }

    public function pdf()
    {
        $pdf = \App::make('dompdf.wrapper')->setPaper('A4','vertical');
        $pdf->loadHTML($this->convert_member_to_html());
        return $pdf->stream();
    }

    public function convert_member_to_html(){
        $laporan = $this->tampil();
        $date = Carbon::today();
        $output = 
        '<img src="base/images/logoatip.png" style="position: absolute; width: 60px; height: auto;"> 
       
        <h1 style="text-align : center">Laporan Pengaduan</h1>
        <h3 style="text-align : center">Politeknik ATIP</h3>
        <h4 style="text-align : center">Jalan Tabing, Bungo Pasang, Koto Tangah, Padang City, West Sumatra 25171</h4>
        <hr>
        <table class="table table-bordered" border="1" width="100%">
         <tr>
            <th>No</th>
            <th>Tipe Pengaduan</th>
            <th>Jenis Pengaduan</th>
            <th>Nama Pengaduan</th>
            <th>Tanggal</th>
            <th>Teknisi</th>
            <th>Biaya Pengaduan</th>
           

        </tr>';
        foreach($laporan as $no =>$data){
            $no++;
        $output.= '
            <tr>
                <td>'.$no.'</td>
                <td>'.$data->tipe.'</td>
                <td>'.$data->jenis.'</td>
                <td>'.$data->a_nama.'</td>
                <td>'.$data->tanggal.'</td>
                <td>'.$data->b_nama.'</td>
                <td>'.$data->biaya.'</td>             
            </tr>';
        }

        $output.= '</table>';
        $output.= 
        '<h5 align="right">Padang, '.$date.'</h5>
        <h5 align="right">Pimpinan</h5>
         <br><br>
         <h5 align="right">Bapak</h5>
        <h5 align="right"></h5>';
        

        return $output;
             
    }
}
