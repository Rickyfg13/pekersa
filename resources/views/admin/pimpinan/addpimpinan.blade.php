@extends('layouts.master')
@section('title', 'Web Pengaduan ATIP - Tambah Data Pimpinan')
@section('content')
<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data Pimpinan</a></li>
                    </ol>
                </div>
    <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Data Pimpinan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                <form action="{{route('tambahpimpinan')}}" method="POST">
                                 @csrf
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
                                            <input type="text" class="form-control" name="nip">
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
                                            <input type="text" class="form-control" name="nama">
                                        </div>
                                        <label @error('unit_kerja')
                                            class="text-danger"
                                        @enderror>Unit Kerja
                                    @error('unit_kerja')
                                        {{$message}}
                                        @enderror
                                </label>
                                        <div class="input-group mb-3 ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                            </div>
                                            <select name="unit_kerja" id="" class="form-control">
                                                <option value="">Pilih Unit Kerja</option>
                                                <option value="SDM">SDM</option>
                                                <option value="Operasional">Operasional</option>
                                            </select>
                                        </div>
                                        <label @error('jabatan')
                                            class="text-danger"
                                        @enderror>Jabatan
                                    @error('jabatan')
                                        {{$message}}
                                        @enderror
                                </label>
                                        <div class="input-group mb-3 ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                            </div>
                                            <select name="jabatan" id="" class="form-control">
                                                <option value="">Pilih Jabatan</option>
                                                <option value="Pemimpin">Pemimpin</option>
                                            </select>
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
                                            <input type="text" class="form-control" name="no_hp">
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
                                            <input type="text" class="form-control" name="email">
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
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-rounded btn-primary" type="submit"  id="toastr-success-top-right">Simpan</button>
                                            <a href="{{route('pimpinan')}}" class="btn btn-rounded btn-secondary">Kembali</a>   
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