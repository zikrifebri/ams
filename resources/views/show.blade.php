@extends('include.template')

@section('main')
    <div id="suratmasuk">
            <h2>Detail Data Surat Masuk</h2>
         
                <div class="row">
                    <div class="col-lg-6 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No.Agenda</th>
                                        <td>{{ $suratmasuk->no_agenda }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode</th>
                                        <td>{{ $suratmasuk->kode }}</td>
                                    </tr>
                                    <tr>
                                        <th>Perihal Surat</th>
                                        <td>{{ $suratmasuk->perihal }}</td>
                                    </tr>
                                    <tr>
                                        <th>Asal Surat</th>
                                        <td>{{ $suratmasuk->departement->nama_departement }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <td>{{ $suratmasuk->no_surat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Surat</th>
                                        <td>{{ $suratmasuk->tgl_surat->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Diterima</th>
                                        <td>{{ $suratmasuk->tgl_diterima->format('d-m-Y') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <p align="left">File lampiran surat masuk ini bertipe <strong>document/image</strong>
                            , silakan klik link dibawah ini untuk melihat file lampiran tersebut.</p>
                                @if (isset($suratmasuk->file))
                                    <a href="{{ asset('fileupload/'. $suratmasuk->file) }}">{{ $suratmasuk->file }}</a>
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