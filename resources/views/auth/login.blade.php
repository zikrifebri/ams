@extends('include.login')

@section('mid')
<div class="transparent">
<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="col-md-8"> -->
            <div class="card">
                <div class="col-md-4 text-center card-left">
                    <span class="logo"><p><img src="fileupload/logo_pusri.png" class="img-responsive" alt="Responsive image"></p></span>
                    <h4 class="company_title">PT. Pupuk Sriwidjaja</h4>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 card-right">
                    <div id="card-content">
                        <div class="card-header"><h3>{{ __('Log In') }}</h3>
                        <!-- <div class="underline-title"></div> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="form" action="{{ route('login') }}">
                            @csrf
                            <!-- <label for="username" style="padding-top:13px">&nbsp;Username</label> -->
                                <div class="col-md-6">
                                    <input id="username" type="text" placeholder="Username" class="form-content @error('username') is-invalid @enderror" 
                                    name="username" value="{{ old('username') }}" required autocomplete="username" autofocus >
                                    <div class="form-border"></div>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            <!-- <label for="password" style="padding-top:22px">&nbsp;Password</label> -->
                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="Password" class="form-content @error('password') is-invalid @enderror" 
                                    name="password" required autocomplete="current-password">
                                    <div class="form-border"></div>
                                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="checkbox" name="remember" class="">
                                    <label for="remember">Remember Me!</label>
                                </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container-fluid text-center footer">
                2021 &copy; Aplikasi Manajemen Surat <a href="https://www.pusri.co.id">| PT. Pusri Palembang</a></p>
            </div>
        <!-- </div> -->
    </div>
</div>
</div>

@endsection
