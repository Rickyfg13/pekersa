<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeknisiController extends Controller
{
    public function index()
    {
        $teknisi = DB::table('user')
        ->where('role', 3)
        ->paginate(10);

        return view('admin.teknisi.teknisi', compact('teknisi'));
    }

    public function add()
    {
        return view('admin.teknisi.addteknisi');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama' =>'required',
            'nip' =>'required',
            'no_hp'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);


        $data =  DB::table('user')
        ->insert([ 
            'nama' => $request->nama,
            'nip' => $request->nip,
            'no_hp' =>$request->no_hp,
            'email' =>$request->email,
            'password' => \Hash::make($request->password),
            'password_text' => $request->password,
            'role' =>3,
        ]);
        
        if($data)
        {
             return redirect()->route('teknisi')->with('success','Berhasil');
        } else {
             return redirect()->route('teknisi')->with('error','Gagal');
        }
    }

    public function delete($id_user)
    {
        DB::table('user')->where('id_user', $id_user)->delete();
        return redirect()->back();
    }

    public function edit($id_user)
    {

        $teknisi = DB::table('user')
        ->where('role', 3)
        ->where('id_user', $id_user)
        ->first();

        return view('admin.teknisi.editteknisi', compact('teknisi'));
    }

    public function update(Request $request, $id_user)
    {
        $validation = $request->validate([
            'nama' =>'required',
            'nip' =>'required',
            'no_hp'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);

        $teknisi = DB::table('user')
        ->where('role', 3)
        ->where('id_user', $id_user)
        ->first();

        $data =  DB::table('user')
        ->where('id_user', $teknisi->id_user)
        ->update([ 
            'nama' => $request->nama,
            'nip' => $request->nip,
            'no_hp' =>$request->no_hp,
            'email' =>$request->email,
            'password' => \Hash::make($request->password),
            'password_text' => $request->password,
            'role' =>3,
        ]);
        
        if($data)
        {
             return redirect()->route('teknisi')->with('success','Berhasil');
        } else {
             return redirect()->route('teknisi')->with('error','Gagal');
        }
    }
}
