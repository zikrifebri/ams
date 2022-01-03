@extends('include.template')

@section('main')
    <div id="user">
            <h2>Tambah Data User</h2>
         
            {!! Form::open(['url' => 'user']) !!}

            @include('user.form', ['submitButtonText' => 'Simpan'])
          
            {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop