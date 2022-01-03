@extends('include.template')

@section('main')
    <div id="suratkeluar">
            <h2>Tambah Data Surat Keluar</h2>
         
            {!! Form::open(['url' => 'suratkeluar', 'files'=>true]) !!}

            @include('suratkeluar.form', ['submitButtonText' => 'Simpan'])
          
            {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop