<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PimpinanController extends Controller
{
    public function index()
    {
        $pimpinan = DB::table('user')
        ->where('role', 4)
        ->paginate(10);

        return view('admin.pimpinan.pimpinan', compact('pimpinan'));
    }

    public function add()
    {
        return view('admin.pimpinan.addpimpinan');
    }

    public function delete($id_user)
    {
        DB::table('user')->where('id_user', $id_user)->delete();
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama' =>'required',
            'nip' =>'required',
            'unit_kerja'=> 'required',
            'jabatan'=> 'required',
            'no_hp'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);


        $data =  DB::table('user')
        ->insert([ 
            'nama' => $request->nama,
            'nip' => $request->nip,
            'unit_kerja' =>$request->unit_kerja,
            'jabatan' =>$request->jabatan,
            'no_hp' =>$request->no_hp,
            'email' =>$request->email,
            'password' => \Hash::make($request->password),
            'password_text' => $request->password,
            'role' =>4,
        ]);
        if($data)
        {
             return redirect()->route('pimpinan')->with('success','Berhasil');
        } else {
             return redirect()->route('pimpinan')->with('error','Gagal');
        }
    }

    public function edit($id_user)
    {
        $pimpinan = DB::table('user')
        ->where('role', 4)
        ->first();

        return view('admin.pimpinan.editpimpinan', compact('pimpinan'));
    }

    public function update(Request $request, $id_user)
    {
        $validation = $request->validate([
            'nama' =>'required',
            'nip' =>'required',
            'unit_kerja'=> 'required',
            'jabatan'=> 'required',
            'no_hp'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);


        $data =  DB::table('user')
        ->where('id_user', $id_user)
        ->update([ 
            'nama' => $request->nama,
            'nip' => $request->nip,
            'unit_kerja' =>$request->unit_kerja,
            'jabatan' =>$request->jabatan,
            'no_hp' =>$request->no_hp,
            'email' =>$request->email,
            'password' => \Hash::make($request->password),
            'password_text' => $request->password,
            'role' =>4,
        ]);
        if($data)
        {
             return redirect()->route('pimpinan')->with('success','Berhasil Update');
        } else {
             return redirect()->route('pimpinan')->with('error','Gagal');
        }
    }


}
