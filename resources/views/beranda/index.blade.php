@extends('include.template')

@section('main')
    <div id="beranda">
            <h2>Dashboard</h2>
            <div class="card">
                @if (Auth::check())
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9">
                                    <span class="card-title">Jumlah Surat Masuk</span>
                                    <h5 class="text"> {{ $jumlah_suratmasuk }} Surat Masuk</h5>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('surat-masuk') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                @endif
                @if (Auth::check())
                    @if (Auth::user()->level !== 'user')
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-9">
                                        <span class="card-title">Jumlah Surat Keluar</span>
                                        <h5 class="text"> {{ $jumlah_suratkeluar }} Surat Keluar</h5>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url('surat-keluar') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif
                @endif
                @if (Auth::check() && Auth::user()->level == 'admin')
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9">
                                    <span class="card-title">Jumlah User</span>
                                    <h5 class="text"> {{ $jumlah_user }} User</h5>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('user') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                @endif

                @if (Auth::check() && Auth::user()->level == 'admin')
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9">
                                    <span class="card-title">Jumlah Departement</span>
                                    <h5 class="text"> {{ $jumlah_asal }} Departement</h5>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('departement') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                @endif

            </div>


    </div>
@stop

@section('footer')
    @include('footer')
@stop