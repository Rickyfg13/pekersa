<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoginUserController extends Controller
{
    public function index()
    {
        return view('user.login');
    }

     //Login Pelapor dan Teknisi
    public function login(Request $request)
    {
      $data = User::where('nip', $request->nip)->firstOrfail();
        if($data)
        {
            if(Hash::check($request->password, $data->password))
            {
              session(['login_user'=> true]);
              Session::put('nip', $data->nip);
              Session::put('id_user', $data->id_user);
              Session::put('email', $data->email);
              Session::put('password', $data->password);
              Session::put('role', $data->role);
              Session::put('nama', $data->nama);
              Session::put('unit_kerja', $data->unit_kerja);
              Session::put('jabatan', $data->jabatan);
              Session::put('fcm_token', $data->fcm_token);
                   
              if(Session::get('role') == 1)
              {
                $data = DB::table('jenis')->get();
                $data = DB::table('user')
                ->where('role',1)
                ->update([
                'fcm_token' => $request->fcm_token
            ]);
                return view('user.index', compact('data'));
              }

              if(Session::get('role') == 3)
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

                $data = DB::table('user')
                ->where('role',3)
                ->update([
                'fcm_token' => $request->fcm_token
                ]);
                return view('user.hometeknisi', compact('sarana', 'prasarana', 'kamtibmas','data'));
              }
                         
            } 
        }
        else
        {
         return redirect('login_user')->with('message', 'Email atau Password Salah');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
