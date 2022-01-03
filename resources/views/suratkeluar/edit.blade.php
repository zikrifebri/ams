@extends('include.template')

@section('main')
    <div id="suratkeluar">
            <h2>Edit Surat Keluar</h2>

    {!! Form::model($suratkeluar, ['method' => 'PATCH', 'files' => true, 'action' => ['skController@update', $suratkeluar->id]]) !!}
                  
    @include('suratkeluar.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}
    </div>
@stop
@section('footer')
    @include('footer')
@stop
