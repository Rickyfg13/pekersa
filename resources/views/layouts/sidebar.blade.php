<div class="deznav">
            <div class="deznav-scroll">
            @if(Session::get('role') == 2)
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('home')}}">Dashboard</a></li>
						</ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-381-menu-1"></i>
							<span class="nav-text">Master</span>
						</a>
                        <ul aria-expanded="false">
                           
                                <ul aria-expanded="false">
                                    <li><a href="{{route('pelapor')}}">Pelapor</a></li>
                                    <li><a href="#">Admin</a></li>
                                    <li><a href="{{route('teknisi')}}">Teknisi</a></li>
                                    <li><a href="{{route('pimpinan')}}">Pimpinan</a></li>
                                </ul>
                           
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-add-3"></i>
							<span class="nav-text">Laporan</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('laporan')}}">Laporan</a></li>  
                        </ul>
                    </li>
                </ul>
                @elseif(Session::get('role') == 4)
                <ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('home')}}">Dashboard</a></li>
						</ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-add-3"></i>
							<span class="nav-text">Laporan</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('laporan')}}">Laporan</a></li>  
                        </ul>
                    </li>
                </ul>
                @endif
			</div>
        </div>


         <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>