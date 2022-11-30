<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailHistoryController extends Controller
{
    public function index($id_laporan)
    {
        $detail = DB::table('log_laporan')
        ->leftjoin('laporan', 'log_laporan.id_laporan', 'laporan.id_laporan')
        ->select('laporan.*', 'log_laporan.*')
        ->where('log_laporan.id_laporan', $id_laporan)
        ->get();

        return view('user.historydetail', compact('detail'));
    }
}
