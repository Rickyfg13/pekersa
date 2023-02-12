@extends('frontend.master')
@section('title', 'Web Pengaduan ATIP - Home')
@section('content')

    <div class="offer-section section-p-t">
        <div class="offer">
            <div class="top-content">
                <div>
                    <h4 class="title-color">Silahkan Pilih Jenis Laporan
                    </h4>
                </div>
            </div>
            {{-- <div class="input-box">
                    <select name="id_jenis" id="" class="form-control" placeholder="">
                        <option value="">Pilih Jenis Pengaduan</option>
                        @foreach ($jenis as $data)
                          <option value="{{$data->id_jenis}}">{{$data->jenis}}</option>
                        @endforeach
                    </select>
                  </div> --}}
            <div class="input-box">
                <ul>
                    <li>
                       
                        <ul class="list-group">
                            @foreach ($jenis as $data)
                                <li class="list-group-item">
                                    <a href="{{ route('pengaduan', ['id' => $data->id_jenis]) }}" value="{{ $data->id_jenis }}"> <i
                                            class="iconly-Category icli"></i> {{ $data->jenis }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>

            {{-- <ul class="list-group">
                <li class="list-group-item">

                    <a href="{{ route('pengaduan') }}" class="font-sm">
                        <i class="iconly-Category icli"></i> Sarana</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('pengaduan.pra') }}" class="font-sm">
                        <i class="iconly-Category icli"></i>
                        Prasarana</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('pengaduan.kha') }}" class="font-sm">
                        <i class="iconly-Category icli"></i>
                        Kamtibmas</a>
                </li>
            </ul> --}}
            {{-- <div class="product-list media">
			           <i class="iconly-Category icli"></i>
                <div class="media-body">
                 
                </div>
                
			           <i class="iconly-Category icli"></i>
                <div class="media-body">
                  
                </div> --}}

        </div>

    </div>
    </div>


@endsection('content')
