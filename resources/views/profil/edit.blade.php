@extends('include.template')

@section('main')
    <div id="user">
            <h2>Edit User</h2>

    {!! Form::model($user, ['method' => 'PATCH', 'action' =>
    ['userController@update', $user->id]]) !!}
                  
    @include('user.form', ['submitButtonText' => 'Update'])

    {!! Form::close() !!}
    </div>
@stop
@section('footer')
    @include('footer')
@stop
