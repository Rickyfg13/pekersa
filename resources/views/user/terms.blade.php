@extends('frontend.master')
@section('title', 'Web Pengaduan ATIP - Login')
@section('content')

<main class="main-wrap login-page mb-xxl">
      <p class="font-sm fw-bold  text-center" style="margin-top: 150px;">Silahkan Baca Terlebih Dahulu!</p>

      <!-- Login Section Start -->
    <section class="login-section p-1" >
        <p class="text-capitalize fw-semibold fs-6 fst-italic"> Pemeliharaan sarana dan prasarana merupakan kewajiban seluruh civitas akademika 
            Politeknik ATI Padang. Dengan ini pelapor menyatakan telah melakukan usaha perbaikan 
            semaksimal mungkin dan belum berhasil sehingga membutuhkan tindak lanjut.
        </p>
    
    
       <p class="text-center">
        <input class="form-check-input center" type="checkbox" value="" id="flexCheckDefault">
       </p>
       
        
      
    
        
        <div class="position-absolute top-300 start-50 translate-middle" style="margin-top: 80px;">
            <a href="{{ route('loginuser') }}" class="btn btn-outline-secondary " >Checklist</a>
        </div>
          
    </section>
      <!-- Login Section End -->
    </main>
    <!-- Main End -->
    <!-- Button trigger modal -->

    
@endsection('content')