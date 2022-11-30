@extends('frontend.master')
@section('title', 'Web Pengaduan ATIP - Home')
@section('content')
    <div class="content-body">
        <div class="offer-section section-p-t">
            <div class="offer">
                <div class="top-content">
                    <div class="header">
                        <h4 class="title-color">Jumlah Laporan Pengaduan Hari Ini</h4>
                    </div>
                </div>

                <div class="product-list media">
                    <i class="iconly-Category icli"></i>
                    <div class="media-body">
                        <a href="#" class="font-sm">Sarana</a>
                        <p>{{ $sarana }} laporan</p>
                    </div>
                </div>

                <div class="product-list media">
                    <i class="iconly-Category icli"></i>
                    <div class="media-body">
                        <a href="#" class="font-sm">Prasarana</a>
                        <p>{{ $prasarana }} Laporan</p>
                    </div>
                </div>

                <div class="product-list media">
                    <i class="iconly-Category icli"></i>
                    <div class="media-body">
                        <a href="#" class="font-sm">Kamtibmas</a>
                        <p>{{ $kamtibmas }} Laporan</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection('content')
