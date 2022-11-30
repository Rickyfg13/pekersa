@extends('layouts.master')
@section('title', 'Web Pengaduan ATIP - Tambah Data Teknisi')
@section('content')
<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data Teknisi</a></li>
                    </ol>
                </div>
    <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Teknisi Data Teknisi</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                <form action="{{route('updateteknisi', $teknisi->id_user)}}" method="POST">
                                 @csrf
                                 @method('patch')
                                 <label @error('nip')
                                            class="text-danger"
                                        @enderror>NIP
                                    @error('nip')
                                        {{$message}}
                                        @enderror
                                </label>
                                        <div class="input-group mb-3 ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nip" value="{{$teknisi->nip}}">
                                        </div>
                                        <label @error('nama')
                                            class="text-danger"
                                        @enderror>Nama
                                    @error('nama')
                                        {{$message}}
                                        @enderror
                                </label>
                                        <div class="input-group mb-3 ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nama" value="{{$teknisi->nama}}">
                                        </div>
                                        <label @error('no_hp')
                                            class="text-danger"
                                        @enderror>No HP
                                    @error('no_hp')
                                        {{$message}}
                                        @enderror
                                </label>
                                        <div class="input-group mb-3 ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="no_hp" value="{{$teknisi->no_hp}}">
                                        </div>
                                         <label @error('email')
                                            class="text-danger"
                                        @enderror>Email
                                    @error('email')
                                        {{$message}}
                                        @enderror
                                </label>
                                        <div class="input-group mb-3 ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="email" value="{{$teknisi->email}}">
                                        </div>
                                        <label @error('password')
                                            class="text-danger"
                                        @enderror>Password
                                    @error('password')
                                        {{$message}}
                                        @enderror
                                </label>
                                        <div class="input-group mb-3 ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                            </div>
                                            <input type="password" class="form-control" name="password" value="{{$teknisi->password_text}}">
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-rounded btn-primary" type="submit"  id="toastr-success-top-right">Simpan</button>
                                            <a href="{{route('teknisi')}}" class="btn btn-rounded btn-secondary">Kembali</a>   
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
    </div>
</div>
</div>
@endsection