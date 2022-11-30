@extends('layouts.master')
@section('title', 'Web Pengaduan ATIP - Detail Laporan')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Laporan</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Laporan</a></li>
                </ol>
            </div>
            
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Detail Laporan</h4>
                            <a href="{{ route('laporan') }}" class="btn btn-rounded btn-info">
                                Kembali</a>
                        </div>
                        @foreach ($laporan as $data)
                        <div class="row m-4">
                            <div class="col-md-2">
                                <label>{{ date('d-F-Y H:i:s', strtotime($data->create_time ))}}</label>
                            </div>
                            
                            <div class="col-md-2">
                                <label>{{ $data->keterangan }}</label>
                            </div>
                        </div>
                        @endforeach
                        
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="#" method="POST">
                                    @csrf
                                    
                                </form>
                                {{-- @if ( Session::get('role') == 3) --}}
                                <a href="{{ route('biaya', $data->id_laporan) }}" class="btn btn-rounded btn-info">
                                    Selesaikan Pengaduan</a>
                                {{-- @endif --}}
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
