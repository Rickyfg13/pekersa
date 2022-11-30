<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $sarana = DB::table('laporan')->where('id_jenis', 4)->count();
        $prasarana = DB::table('laporan')->where('id_jenis', 5)->count();
        $kamtibmas = DB::table('laporan')->where('id_jenis', 6)->count();

        $laporan = DB::table('laporan')
        ->leftjoin('user', 'laporan.id_pelapor', 'user.id_user')
        ->leftjoin('jenis', 'laporan.id_jenis', 'jenis.id_jenis')
        ->select('laporan.*', 'user.*', 'jenis.*')
        ->whereDate('laporan.create_time', Carbon::today())
        ->paginate(10);

        return view('admin.home', compact('sarana', 'laporan', 'prasarana', 'kamtibmas'));
    }
}
