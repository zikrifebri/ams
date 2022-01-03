@extends('include.template')

@section('main')
    <div id="departement">
            <h2>Tambah Data Departement</h2>
         
            {!! Form::open(['url' => 'departement']) !!}

            @include('departement.form', ['submitButtonText' => 'Simpan'])
          
            {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop