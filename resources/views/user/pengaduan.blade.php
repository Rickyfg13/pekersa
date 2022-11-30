@extends('frontend.master')
@section('title', 'Web Pengaduan ATIP - Form Pengaduan')
@section('content')


    <main class="main-wrap login-page mb-xxl">
        <p class="font-sm content-color">Laporan Pengaduan Sarana</p>
       
        <!-- Login Section Start -->
        <section class="login-section p-0">
            <!-- Login Form Start -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <!-- <button type="button" class="close" data-dismiss="alert">×</button>-->
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <!-- <button type="button" class="close" data-dismiss="alert">×</button>-->
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form action="{{ route('store.pengaduan') }} " class="custom-form" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Email Input start -->
                <div class="input-box">
                    <select name="id_jenis"  class="form-control" placeholder="">
                        <option value="">Pilih Jenis Pengaduan</option>
                        @foreach ($jenis as $data)
                            <option value="{{ $data->id_jenis }}">{{ $data->jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="date" id="demo" class="form-control mb-3" name="tanggal">
                </div>

                <div class="form-group">
                    <input type="Text" class="form-control mb-3" name="lokasi" placeholder="Lokasi Kerusakan">
                </div>

                <!-- Email Input End -->

                <!-- Password Input start -->

                <div class="input-box">
                    <input name="merk" class="form-control" placeholder="Merk Barang"></input>
                </div>
                <div class="input-box">
                    <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                </div>

                <div class="input-box">
                    <input type="file" placeholder="foto" required class="form-control" name="foto" />
                </div>
                <!-- Password Input End -->
                @if (session('message'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                            </polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong> {{ session('message') }}</strong>
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                    class="mdi mdi-close"></i></span>
                        </button>
                    </div>
                @endif

                <button type="submit" class="btn-solid">Kirim</button>
            </form>
            <!-- Login Form End -->

            <!-- Social Section Start -->

            <!-- Social Section End -->
        </section>
        <!-- Login Section End -->
    </main>
    <!-- Main End -->
  
    <!-- TODO: Add SDKs for Firebase products that you want to use
            https://firebase.google.com/docs/web/setup#available-libraries -->

            


@endsection
