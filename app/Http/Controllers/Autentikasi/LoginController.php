<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoginController extends Controller
{
    //Login Admin Dan Pimpinan
    public function login(Request $request)
    {
      $data = User::where('email', $request->email)->firstOrfail();
        if($data)
        {
          if(Hash::check($request->password, $data->password))
          {
            session(['berhasil_login'=> true]);
            Session::put('id_user', $data->id_user);
            Session::put('email', $data->email);
            Session::put('password', $data->password);
            Session::put('role', $data->role);
            Session::put('nama', $data->nama);
                   
            if(Session::get('role') == 2)
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

              $data = DB::table('user')
              ->where('role',2)
              ->update([
              'fcm_token' => $request->fcm_token
              ]);

              return view('admin.home', compact('sarana', 'laporan', 'prasarana', 'kamtibmas','data'));
            }

            if(Session::get('role') == 4)
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

              $data = DB::table('user')
              ->where('role',4)
              ->update([
              'fcm_token' => $request->fcm_token
              ]);

              return view('admin.home', compact('sarana', 'laporan', 'prasarana', 'kamtibmas','data'));
            }

          } 
          
        } 
        else
        {
        return redirect('/admin')->with('message', 'Email atau Password Salah');
        }
            
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin');
    }
}
