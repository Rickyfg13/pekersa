@extends('frontend.master')
@section('title', 'Web Pengaduan ATIP - Login')
@section('content')
<main class="main-wrap login-page mb-xxl">
      <p class="font-sm content-color">Silahkan Login Terlebih Dahulu.</p>

      <!-- Login Section Start -->
      <section class="login-section p-0">
        <!-- Login Form Start -->
        <form action="{{route('login_user')}}" class="custom-form" method="POST"> 
          @csrf
          <input type="hidden" id="fcm_token" name="fcm_token" value="test">
          <h1 class="font-md title-color fw-600">Login Account</h1>

          <!-- Email Input start -->
          <div class="input-box">
            <input type="text" placeholder="NIP" required class="form-control"  name="nip"/>
            <i data-feather="at-sign"></i>
          </div>
          <!-- Email Input End -->

          <!-- Password Input start -->
          <div class="input-box">
            <input type="password" placeholder="Password" required class="form-control" name="password"/>
            <i class="iconly-Hide icli showHidePassword"></i>
          </div>
          <!-- Password Input End -->
          @if(session('message'))
            <div class="alert alert-danger alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                  <strong> {{session('message')}}</strong>
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
              </div>
          @endif
          <button type="submit" class="btn-solid">Sign in</button>
          
        </form>
        <!-- Login Form End -->

        <!-- Social Section Start -->
        
        <!-- Social Section End -->
      </section>
      <!-- Login Section End -->
    </main>
    <!-- Main End -->
    
    <script type="text/javascript">
        
        function fcmToken(vale){
            document.getElementById("fcm_token").value = vale;
        }
        
    </script>

@endsection('content')