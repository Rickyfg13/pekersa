<footer class="footer-wrap">
      <ul class="footer">
      @if(Session::get('role') == 1)
        <li class="footer-item">
          <a href="{{route('homeuser')}}" class="footer-link">
            <i class="iconly-Home icli"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="footer-item">
          <a href="{{route('history')}}" class="footer-link">
            <i class="iconly-Category icli"></i>
            <span>History</span>
          </a>
        </li>
        <li class="footer-item">
          <a href="{{route('profile')}}" class="footer-link">
            <i class="iconly-Profile icli"></i>
            <span>Profile</span>
          </a>
        </li>
        @elseif(Session::get('role') == 3) <li class="footer-item">
          <a href="{{route('hometeknis')}}" class="footer-link">
            <i class="iconly-Home icli"></i>
            <span>Home</span>
          </a>
        </li>

        <li class="footer-item">
          <a href="{{route('historyteknisi')}}" class="footer-link">
            <i class="iconly-Category icli"></i>
            <span>History</span>
          </a>
        </li>
        <li class="footer-item">
          <a href="{{route('profile')}}" class="footer-link">
            <i class="iconly-Profile icli"></i>
            <span>Profile</span>
          </a>
        </li>
        @endif
      </ul>
    </footer>