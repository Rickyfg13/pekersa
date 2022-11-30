<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = DB::table('laporan')
        ->leftjoin('user as a', 'laporan.id_pelapor', 'a.id_user')
       ->leftjoin('user as b', 'laporan.id_teknisi', 'b.id_user')
        ->leftjoin('jenis', 'laporan.id_jenis', 'jenis.id_jenis')
        ->select('laporan.*', 'a.nama as a_nama', 'jenis.*', 'b.nama as b_nama')
        ->paginate(10);

        return view('admin.laporan.laporan', compact('laporan'));
    }

    public function detail($id_laporan)
    {
        $laporan = DB::table('log_laporan')
        ->leftjoin('laporan', 'log_laporan.id_laporan', 'laporan.id_laporan')
        ->select('laporan.*', 'log_laporan.*')
        ->where('log_laporan.id_laporan', $id_laporan)
        ->get();

        return view('admin.laporan.detaillaporan', compact('laporan'));
    }

    public function pilihteknisi($id_laporan)
    {
        $teknisi = DB::table('user')->where('role', 3)->get();

        $laporan = DB::table('laporan')
        ->leftjoin('user', 'laporan.id_pelapor', 'user.id_user')
        ->leftjoin('jenis', 'laporan.id_jenis', 'jenis.id_jenis')
        ->select('laporan.*', 'user.*', 'jenis.*')
        ->where('laporan.id_laporan', $id_laporan)
        ->first();

        return view('admin.laporan.tambahteknisi', compact('teknisi', 'laporan'));

    }

    public function tambahteknisi(Request $request, $id_laporan)
    {
        $validation = $request->validate([
            'id_teknisi' =>'required',
           
        ]);


        $data =  DB::table('laporan')
        ->where('id_laporan', $id_laporan)
        ->update([ 
            'id_teknisi' => $request->id_teknisi,
         
        ]);
        if($data)
        {
             return redirect()->route('laporan')->with('success','Berhasil');
        } else {
             return redirect()->route('laporan')->with('error','Gagal');
        }
    }

    public function biaya($id_laporan)
    {
        $data = DB::table('laporan')
        ->leftjoin('user', 'laporan.id_pelapor', 'user.id_user')
        ->leftjoin('jenis', 'laporan.id_jenis', 'jenis.id_jenis')
        ->select('laporan.*', 'user.*', 'jenis.*')
        ->where('laporan.id_laporan', $id_laporan)
        ->first();

        return view('admin.laporan.biaya', compact('data'));

    }

    public function addbiaya(Request $request, $id_laporan)
    {
        $validation = $request->validate([
            'biaya' =>'required',
           
        ]);


        $data =  DB::table('laporan')
        ->where('id_laporan', $id_laporan)
        ->update([ 
            'biaya' => $request->biaya,
            'status' =>3,
         
        ]);


        if($data)
        {
             return redirect()->route('laporan')->with('success','Berhasil Memasukkan Biaya');
        } else {
             return redirect()->route('laporan')->with('error','Gagal');
        }
    }
}
