<header class="header">
        <div class="logo-wrap">
          <i class="iconly-Category icli"></i>
          <a href="#"> <img class="logo logo-w" src="{{asset('frontend/images/logo/logo-w.png')}}" alt="logo" /></a>
          <a href="#"><h3>Portal Pelaporan</h3></a>
        </div>
        @if(Session::get('role') == 1 OR Session::get('role') == 3) 
        <div class="avatar-wrap">
          <a href="{{route('profile')}}"> <img class="avatar" src="{{asset('base/images/profile/user.png')}}" alt="avatar" /></a>
          <h4>Hai, {{ session('nama') }}</h4>
        </div>
        @else
        <div class="avatar-wrap">
          <img class="avatar" src="{{asset('base/images/logoatip.png')}}" alt="avatar" />
        </div>
        @endif
</header>