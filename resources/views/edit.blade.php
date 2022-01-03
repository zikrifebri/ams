@extends('include.template')

@section('main')
    <div id="suratmasuk">
            <h2>Edit Surat Masuk</h2>

    {!! Form::model($suratmasuk, ['method' => 'PATCH', 'files' => true, 'action' => ['smController@update', $suratmasuk->id]]) !!}
                  
    @include('form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}
    </div>
@stop
@section('footer')
    @include('footer')
@stop
