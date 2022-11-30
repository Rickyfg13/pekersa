@extends('frontend.master')
@section('title', 'Web Pengaduan ATIP - Detail History Pengaduan')
@section('content')
<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
       
        <div class="card card-stepper" style="border-radius: 10px;">
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex flex-column">
                <span class="lead fw-normal">Laporan Pengaduan</span>
                
              </div>
            </div>
            <hr class="my-4">
            <h4>History Pengaduan</h4>
            <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
              <span class="dot"></span>
              <hr class="flex-fill track-line"><span class="dot"></span>
              <hr class="flex-fill track-line"><span class="dot"></span>
              <hr class="flex-fill track-line"><span class="dot"></span>
              <hr class="flex-fill track-line"><span
                class="d-flex justify-content-center align-items-center big-dot dot">
                <i class="fa fa-check text-white"></i></span>
            </div>
             @foreach($detail as $data)
            <div class="d-flex flex-row justify-content-between align-items-center">
              <div class="d-flex flex-column align-items-start"><br>Tanggal : {{$data->tanggal}}<br>
                <br>Keterangan :{{$data->keterangan}} <br>
            @endforeach
          </div>
            </div>
          </div>
        </div>
        <br>
        @if(Session::get('role') == 3 AND $data->biaya == NULL) 
        <a href="{{route('progress', $data->id_laporan)}}" class="btn btn-info">Tambah Progress Pengaduan</a>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection