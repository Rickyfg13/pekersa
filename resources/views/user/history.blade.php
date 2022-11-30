@extends('frontend.master')
@section('title', 'Web Pengaduan ATIP - History Pengaduan')
@section('content')
    <div>
        <h4 class="title-color">History Pengaduan</h4>
    </div>
    <div class="tab-content ratio2_1 section-p-tb" id="pills-tabContent-sk">
        <!-- Catagories Content Start -->

        <div class="tab-pane fade show active" id="catagories1-sk" role="tabpanel">

            @foreach ($pengaduan as $data)
                <div class="order-box">
                    <div class="media">
                        <a href="javascript:void(0)" class="content-box">
                            <h2 class="font-sm title-color">Nama Pelapor : {{ $data->a_nama }}</h2>
                            <h2 class="font-xs content-color">Tipe Kerusakan : {{ $data->tipe }}</h2>
                            <h2 class="font-xs content-color">Jenis Kerusakan : {{ $data->jenis }}</h2>
                            <h2 class="font-xs content-color">Tanggal : {{ $data->tanggal }}</h2>
                            <h2 class="font-xs content-color">Teknisi : 
                            @if( $data->b_nama == null )
                              <strong>  Belum Dipilih
                              </strong>
                            @else 
                              <strong>{{ $data->b_nama }}</strong>
                            @endif
                            </h2>
                            <h2 class="font-xs content-color">Status :
                                @if ($data->status == 1)
                                    Mulai
                                @elseif($data->status == 2)
                                    Proses
                                @else
                                    Selesai
                                @endif
                            </h2>
                            <h2 class="font-xs content-color">Biaya : Rp.{{ $data->biaya }}</h2>
                        </a>
                        <div class="media-body">
                            <div class="img">
                            </div>
                        </div>
                    </div>
                    <div class="bottom-content">
                        <a href="{{ route('detailhistory', $data->id_laporan) }}" class="btn btn-info">Detail Pengaduan</a>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
    
@endsection('content')
