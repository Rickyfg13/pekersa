<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeTeknisiController extends Controller
{
    public function index()
    {
        $sarana = DB::table('laporan')
        ->leftjoin('jenis', 'laporan.id_jenis', 'jenis.id_jenis')
        ->where('jenis.id_jenis',4)
        ->whereDate('laporan.create_time', Carbon::today())
        ->count();
        $prasarana = DB::table('laporan')
        ->leftjoin('jenis', 'laporan.id_jenis', 'jenis.id_jenis')
        ->where('jenis.id_jenis',5)
        ->whereDate('laporan.create_time', Carbon::today())
        ->count();
        $kamtibmas = DB::table('laporan')
        ->leftjoin('jenis', 'laporan.id_jenis', 'jenis.id_jenis')
        ->where('jenis.id_jenis',6)
        ->whereDate('laporan.create_time', Carbon::today())
        ->count();
        return view('user.hometeknisi', compact('sarana', 'prasarana', 'kamtibmas'));
    }
}
