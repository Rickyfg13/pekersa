<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class HistoryController extends Controller
{
    public function index()
    {
        $pengaduan = DB::table('laporan')
        ->leftjoin('user as a', 'laporan.id_pelapor', 'a.id_user')
       ->leftjoin('user as b', 'laporan.id_teknisi', 'b.id_user')
        ->leftjoin('jenis', 'laporan.id_jenis', 'jenis.id_jenis')
        ->select('laporan.*', 'a.nama as a_nama', 'jenis.*', 'b.nama as b_nama')
        ->where('a.id_user', Session::get('id_user'))
        ->paginate(10);


        return view('user.history', compact('pengaduan'));
    }

    public function indexteknisi()
    {
        $pengaduan = DB::table('laporan')
        ->leftjoin('user as a', 'laporan.id_pelapor', 'a.id_user')
       ->leftjoin('user as b', 'laporan.id_teknisi', 'b.id_user')
        ->leftjoin('jenis', 'laporan.id_jenis', 'jenis.id_jenis')
        ->select('laporan.*', 'a.nama as a_nama', 'jenis.*', 'b.nama as b_nama')
        ->where('b.id_user', Session::get('id_user'))
        ->paginate(10);


        return view('user.history', compact('pengaduan'));
    }

    
}
