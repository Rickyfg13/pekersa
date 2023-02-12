<?php

namespace App\Http\Controllers\User;
use Notification;
use App\Notifications\SendPushNotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    public function index($id)
    {
    //     $jenis = DB::table('jenis')->get();
    //     return view('user.pengaduan', compact('jenis'));
        $id_jenis = $id;
		$jenis =  DB::table('jenis')
			->where('id_jenis', $id)
			->select('id_jenis','jenis')
			->get();
        // dd($jenis);
        if($id == 4){
            return view('user.pengaduan', compact('jenis', 'id_jenis'));
        } elseif($id == 5){
            return view('user.pengaduan.prasarana.index', compact('jenis', 'id_jenis'));
        } else{
           return view('user.pengaduan.khatibmas.index', compact('jenis', 'id_jenis'));
        }
       
    }

    public function store(Request $request)
    {   
        $validation = $request->validate([
            
            'id_jenis' => 'required',
            'lokasi' => 'required',
            'nama_alat'=>'required',
            'property' => 'required',
            'tanggal' => 'required',
            'merk' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|mimes:jpeg,png',
        ]);

        $imageaduan = null;
        if($request->foto) 
           {
                 $imageaduan = $request->foto->getClientOriginalName();
                 $request->foto->move(public_path('image/berkas'), $imageaduan);
           }

           
        $data = DB::table('laporan')
            ->insertGetId([
                'id_pelapor' => Session::get('id_user'),
                'id_jenis' =>$request->id_jenis,
                'property' =>$request->property,
                'nama_alat' =>$request->nama_alat,
                'merk' => $request->merk,
                'lokasi' => $request->lokasi,
                'foto' =>$imageaduan,
                'tanggal' =>$request->tanggal,
                'deskripsi' =>$request->deskripsi,
                'status' =>1,
            ]);

            $d = DB::table('log_laporan')->insert([
                
                'id_laporan' => $data,
                'keterangan' => "Mulai"
            ]);

            // SendNotif::
            // Notification::send($data,new SendPushNotification($id_jenis,$deskripsi,$fcmTokens));
            if($data)
            {
                 return redirect()->route('history')
                 ->with('success','"Laporan Pengaduan telah disimpan dengan nomor 2022.10.01.001 
                 (tahun.bulan.tanggal.nomor urut maksimal 100),
                 Cek pada menu Status Laporan”
                 ' )
                 ;
           
            } else {
                 return redirect()->route('history')->with('error','Gagal');
            }
       
    }
    

    public function progress($id_laporan)
    {
        $laporan = DB::table('laporan')
        ->leftjoin('user', 'laporan.id_pelapor', 'user.id_user')
        ->leftjoin('jenis', 'laporan.id_jenis', 'jenis.id_jenis')
        ->select('laporan.*', 'user.*', 'jenis.*')
        ->where('id_laporan', $id_laporan)
        ->first();

        $teknisi = DB::table('user')->where('role', 3)->get();

        return view('user.progress', compact('laporan', 'teknisi'));
    }

    public function kirim(Request $request)
    {
        $validation = $request->validate([
            
            'tipe' => 'required',
            'id_jenis' => 'required',
            'property' => 'required',
            'merk' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|mimes:jpeg,png',
        ]);

        $imageaduan = null;

        if($request->foto) 
           {
                 $imageaduan = $request->foto->getClientOriginalName();
                 $request->foto->move(public_path('image/berkas'), $imageaduan);
           }

           
        $data = DB::table('laporan')
            ->insertGetId([
                'id_pelapor' => Session::get('id_user'),
                'id_jenis' =>$request->id_jenis,
                'property' =>$request->property,
                'tipe' => $request->tipe,
                'merk' => $request->merk,
                'lokasi' => $request->lokasi,
                'foto' =>$imageaduan,
                'tanggal' =>$request->tanggal,
                'deskripsi' =>$request->deskripsi,
                'status' =>1,
            ]);

            $d = DB::table('log_laporan')->insert([
                
                'id_laporan' => $data,
                'keterangan' => "Mulai"
            ]);

            if($data)
            {
                 return redirect()->route('history')->with('success','"Laporan Pengaduan telah disimpan dengan nomor 2022.10.01.001 
                 (tahun.bulan.tanggal.nomor urut maksimal 100),
                 Cek pada menu Status Laporan”
                 ');
            } else {
                 return redirect()->route('history')->with('error','Gagal');
            }
    }

    public function addprogress(Request $request, $id_laporan)
    {
        $validation = $request->validate([
            
            'keterangan' => 'required',
        ]);

        $laporan = DB::table('laporan')->where('id_laporan', $id_laporan)->first();

        $data = DB::table('log_laporan')->insert([
            'id_laporan' => $laporan->id_laporan,
            'keterangan' =>$request->keterangan
        ]);

        $d = DB::table('laporan')
        ->where('id_laporan', $laporan->id_laporan)
        ->update([
            'status' => 2,
        ]);


        if($data)
        {
             return redirect()->back()->with('success','Tambah Keterangan Berhasil');
        } else {
             return redirect()->back()->with('error','Gagal');
        }
        

    }
 
    public function index_pra()
    {
        $jenis = DB::table('jenis')->get();
        return view('user.pengaduan.prasarana.index', compact('jenis'));
    }

    public function store_pra(Request $request)
    {
        $validation = $request->validate([
            'tanggal' => 'required',
            'id_jenis' => 'required',
            'property' => 'required',
            'lokasi' => 'required',
            'tipe' => 'required',
            'foto' => 'required|mimes:jpeg,png',
        ]);

        $imageaduan = null;
        if($request->foto) 
           {
                 $imageaduan = $request->foto->getClientOriginalName();
                 $request->foto->move(public_path('image/berkas'), $imageaduan);
           }

           
        $data = DB::table('laporan')
            ->insertGetId([
                'id_pelapor' => Session::get('id_user'),
                'tanggal' =>$request->tanggal,
                'id_jenis' =>$request->id_jenis,
                'property' =>$request->property,
                'tipe' =>$request->tipe,
                'lokasi' => $request->lokasi,
                'foto' =>$imageaduan,
                'status' =>1,
            ]);

            $d = DB::table('log_laporan')->insert([
                
                'id_laporan' => $data,
                'keterangan' => "Mulai"
            ]);

            if($data)
            {
                 return redirect()->route('history')
                 ->with('success','"Laporan Pengaduan telah disimpan dengan nomor 2022.10.01.001 
                 (tahun.bulan.tanggal.nomor urut maksimal 100),
                 Cek pada menu Status Laporan”
                 ');
            } else {
                 return redirect()->route('history')->with('error','Gagal');
            }
    }
    public function index_kha()
    {
        $jenis = DB::table('jenis')->get();
        return view('user.pengaduan.khatibmas.index', compact('jenis'));
    }

    public function store_kha(Request $request)
    {
        $validation = $request->validate([
            'lokasi' => 'required',
            'id_jenis' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'foto' => 'required|mimes:jpeg,png',
        ]);

        $imageaduan = null;
        if($request->foto) 
           {
                 $imageaduan = $request->foto->getClientOriginalName();
                 $request->foto->move(public_path('image/berkas'), $imageaduan);
           }

           
        $data = DB::table('laporan')
            ->insertGetId([
                'id_pelapor' => Session::get('id_user'),
                'lokasi' => $request->lokasi,
                'tanggal' =>$request->tanggal,
                'id_jenis' =>$request->id_jenis,
                'deskripsi' =>$request->deskripsi,
                'foto' =>$imageaduan,
                'status' =>1,
            ]);

            $d = DB::table('log_laporan')->insert([
                
                'id_laporan' => $data,
                'keterangan' => "Mulai"
            ]);

            if($data)
            {
                 return redirect()->route('history')
                 ->with('success','"Laporan Pengaduan telah disimpan dengan nomor 2022.10.01.001 
                 (tahun.bulan.tanggal.nomor urut maksimal 100),
                 Cek pada menu Status Laporan”
                 ');
            } else {
                 return redirect()->route('history')->with('error','Gagal');
            }
    }

    
}
