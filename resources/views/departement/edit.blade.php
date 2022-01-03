@extends('include.template')

@section('main')
    <div id="departement">
            <h2>Edit Departement</h2>

    {!! Form::model($departement, ['method' => 'PATCH', 'action' => ['asController@update', $departement->id]]) !!}
                  
    @include('departement.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}
    </div>
@stop
@section('footer')
    @include('footer')
@stop
