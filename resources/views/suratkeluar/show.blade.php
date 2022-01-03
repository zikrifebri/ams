@extends('include.template')

@section('main')
    <div id="suratkeluar">
            <h2>Detail Data Surat Keluar</h2>
         
                <div class="row">
                    <div class="col-lg-6 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No.Agenda</th>
                                        <td>{{ $suratkeluar->no_agenda }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tujuan</th>
                                        <td>{{ $suratkeluar->departement->nama_departement }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode</th>
                                        <td>{{ $suratkeluar->kode }}</td>
                                    </tr>
                                    <tr>
                                        <th>Perihal Surat</th>
                                        <td>{{ $suratkeluar->perihal }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <td>{{ $suratkeluar->no_surat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Surat</th>
                                        <td>{{ $suratkeluar->tgl_surat->format('d-m-Y') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <p align="left">File lampiran surat masuk ini bertipe <strong>document/image</strong>, silakan klik link dibawah ini untuk melihat file lampiran tersebut.</p>
                                @if (isset($suratkeluar->file))
                                    <a href="{{ asset('fileupload/'. $suratkeluar->file) }}">{{ $suratkeluar->file }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

    </div>
@stop

@section('footer')
    @include('footer')
@stop