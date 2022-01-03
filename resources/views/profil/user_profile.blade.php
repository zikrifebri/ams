@extends('include.template')

@section('main')
    <div class="main">
      <div class="main-content">

        <div class="panel panel-profile">
          <div class="clearfix">
            <div class="profile-left">
              <div class="profile-header">
                <div class="overplay"></div>
                <div class="profile-main">
                  <img width="100" height="100" src="{{ asset('fileupload') }}/{{ auth()->user()->foto == null
                  ? 'avatar.png': auth()->user()->foto }}"  alt="Avatar" class="img-circle">
                  <h3 class="name">{{ $user->name }}</h3>
                  <span class="online-status status-available">Online</span>
                </div>
                <div class="profile-stat">
                  <div class="row">
                    <div class="col-md-4 stat-item">
                      {{ $user->level }} <span>Jabatan</span>
                    </div>
                    <div class="col-md-4 stat-item">
                      {{ $user->nip }} <span>Nip</span>
                    </div><div class="col-md-4 stat-item">
                      {{ $user->departement->nama_departement }} <span>Departement</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="profile-right">
              <div class="custom-tabs-line tabs-line-bottom left-aligmed">
                <ul class="nav" role="tablist">
                  <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Data Pribadi</a></li>
                  <li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Edit Data<span class="badge">9</span></a></li>
                </ul>
              </div>
              <div class="tab-content">
                <div class="tab-pane in active" id="tab-bottom-left1">
                  <h4 class="heading"><strong>Profile</strong></h4>
                  <div class="divider"></div>
                  <ul class="list-unstyled list-justify">
                    <li>username<span>{{ $user->username }}</span></li>
                    <li>Email<span>{{ $user->email }}</span></li>
                    <li>Alamat<span>{{ $user->alamat }}</span></li>
                    <li>TTL<span>{{ $user->ttl }}</span></li>
                    <li>Telepon<span>{{ $user->telepon }}</span></li>
                    <li>Jenis Kelamin<span>{{ $user->jenis_kelamin }}</span></li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="tab-bottom-left2">
                  <form action="{{ route('simpan_edit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" placeholder="Nama">
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="password">Password <h6>*Harus Diisi</h6></label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation">Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" 
                      placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $user->alamat }}" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                      <label for="ttl">TTL</label>
                      <input type="text" name="ttl" class="form-control" id="ttl" value="{{ $user->ttl }}" placeholder="TTL">
                    </div>
                    <div class="form-group">
                      <label for="telepon">Telepon</label>
                      <input type="number" name="telepon" class="form-control" id="telepon" value="{{ $user->telepon }}" placeholder="Telepon">
                    </div>
                    <div class="form-group">
                      <label for="jeniskelamin">Jenis Kelamin</label>
                      <div class="radio">
                        <label>
                          <input type="radio" name="jeniskelamin" id="optionsRadios1" value="Laki-Laki" {{ $user->jenis_kelamin == 'Laki-Laki' ? 
                          'checked': '' }}>
                          Laki - Laki
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="jeniskelamin" id="optionsRadios2" value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 
                          'checked': '' }}>
                          Perempuan
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="foto">Foto input</label>
                      <input type="file" id="foto" name="foto"> 
                      <p class="help-block"></p>
                    </div>
                    <button type="submit" class="btn btn-default">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop

@section('footer')
    @include('footer')
@stop
