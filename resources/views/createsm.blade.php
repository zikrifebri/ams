@extends('include.template')

@section('main')
    <div id="suratmasuk">
        <h2>Tambah Data Surat Masuk</h2>
        
            {!! Form::open(['url' => 'suratmasuk', 'files'=>true]) !!}

            @include('form', ['submitButtonText' => 'Simpan'])
            
            {!! Form::close() !!}

@stop

@section('footer')
    @include('footer')
@stop