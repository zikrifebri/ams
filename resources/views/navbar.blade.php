<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"
                    data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/')}}">Aplikasi Manajemen Surat</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav side-nav">
                    @if (!empty($halaman) && $halaman == 'beranda')
                        <li class="active"><a href="{{ url('/') }}">Beranda
                            <span class="sr-only">(current)</a></li>
                    @else
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                    @endif
                    @if (Auth::check())
                        @if (!empty($halaman) && $halaman == 'suratmasuk')
                            <li class="active"><a href="{{ url('surat-masuk') }}">Surat Masuk
                                <span class="sr-only">(current)</a></li>
                        @else
                            <li><a href="{{ url('surat-masuk') }}">Surat Masuk</a></li>
                        @endif
                    @endif

                    @if ((Auth::check() && Auth::user()->level !== 'user'))
                        @if (!empty($halaman) && $halaman == 'suratkeluar')
                            <li class="active"><a href="{{ url('surat-keluar') }}">Surat Keluar
                                <span class="sr-only">(current)</a></li>
                        @else
                            <li><a href="{{ url('surat-keluar') }}">Surat Keluar</a></li>
                        @endif
                    @endif

                    @if (Auth::check() && Auth::user()->level == 'admin')
                        @if (!empty($halaman) && $halaman == 'departement')
                            <li class="active"><a href="{{ url('departement') }}">Departement
                                <span class="sr-only">(current)</a></li>
                        @else
                            <li><a href="{{ url('departement') }}">Departement</a></li>
                        @endif
                    @endif

                    @if (Auth::check() && Auth::user()->level == 'admin')
                        @if (!empty($halaman) && $halaman == 'user')
                            <li class="active"><a href="{{ url('user') }}">User
                                <span class="sr-only">(current)</span></a></li>
                        @else
                            <li><a href="{{ url('user') }}">User</a></li>
                        @endif
                    @endif
               </ul>
            <ul class="nav navbar-right top-nav">
                @if (Auth::check())
                    <li class="dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"  
                        aria-haspopup="true" aria-expanded="false" v-pre> <img width="30" height="20" 
                        src="{{ asset('fileupload') }}/{{ auth()->user()->foto == null ? 'avatar.png': auth()->user()->foto }}" 
                        alt="Avatar" class="img-circle"> {{ Auth::user()->name }} <span class="caret"></span> </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a href="{{ url('profile') }}" class="dropdown-item">Profile</a>
                            </li>
                        <li class="divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();  
                                document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}"  method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
            </ul>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                    {{ __('Login') }}</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>