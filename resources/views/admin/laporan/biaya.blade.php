@extends('layouts.master')
@section('title', 'Web Pengaduan ATIP - Biaya Pengaduan')
@section('content')
<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Laporan</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Biaya Pengaduan</a></li>
                    </ol>
                </div>
    <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Biaya Pengaduan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                <form action="{{route('addbiaya', $data->id_laporan)}}" method="POST">
                                 @csrf
                                 @method('patch')
                                        <label @error('biaya')
                                            class="text-danger"
                                        @enderror>Biaya Pengaduan
                                    @error('biaya')
                                        {{$message}}
                                        @enderror
                                </label>
                                <div class="input-group mb-3 ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-th-list"></i></span>
                                            </div>
                                            <input type="number" class="form-control" name="biaya">
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-rounded btn-primary" type="submit"  id="toastr-success-top-right">Simpan</button>
                                            <a href="{{route('laporan')}}" class="btn btn-rounded btn-secondary">Kembali</a>   
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