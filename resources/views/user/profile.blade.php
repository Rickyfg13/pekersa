@extends('frontend.master')
@section('title', 'Web Pengaduan ATIP - Profile')
@section('content')
<main class="main-wrap account-page mb-xxl">
      <div class="account-wrap section-b-t">
        <div class="user-panel">
          <div class="media">
            <a href="#"> <img src="{{asset('base/images/profile/user.png')}}" alt="avatar" /></a>
            <div class="media-body">
              <a href="#" class="title-color">Nama : {{ session('nama') }}
                <span class="content-color font-sm">Email : {{ session('email') }}</span>
                <span class="content-color font-sm">Unit Kerja : {{ session('unit_kerja') }}</span>
                <span class="content-color font-sm">Jabatan : {{ session('jabatan') }}</span>
                @if(Session::get('role') == 1)
                <span class="content-color font-sm">Pelapor</span>
                @elseif(Session::get('role') == 3)
                <span class="content-color font-sm">Teknisi</span>
                @else
                -
                @endif
              </a>
            </div>
          </div>
        </div>

        <!-- Navigation Start -->
        <ul class="navigation">
          <li>
            <a href="{{route('logout_user')}}" class="nav-link title-color font-sm">
              <i class="iconly-Logout icli"></i>
              <span>Logout</span>
            </a>
            <a href="#" class="arrow"><i data-feather="chevron-right"></i></a>
          </li>
</div>
</main>
@endsection('content')
