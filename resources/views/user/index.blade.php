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
                <ul class="list-group">
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
                            Khatibmas</a>
                    </li>
                </ul>
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
