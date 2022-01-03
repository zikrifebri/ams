@extends('include.template')

@section('main')
    <div id="user">
            <h2>Manajemen User</h2>

            @if (count($user_list) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Nip</th>
                            <th>Departement</th>
                            <th>Jabatan</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0 ?>
                        <?php foreach($user_list as $user): ?>
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->nip }}</td>
                                <td>{{ $user->departement->nama_departement }}</td>
                                <td>{{ $user->level }}</td>
                                <td>
                                <div class="box-button">
                                    {{ link_to('user/' . $user->id . '/edit', 'Edit', 
                                    ['class' => 'btn btn-warning btn-sm']) }}
                                </div>
                                <div class="box-button">
                                    {!! Form::open(['method' => 'DELETE', 'action' => 
                                    ['userController@destroy', $user->id]]) !!}
                                    {!! Form::submit('Delete', 
                                    ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </div>
                                </td>
                            </tr>
                            <?php endforeach ?>
                    </tbody>
                </table>
            @else
                <p>Tidak Ada Data Asal User</p>
                @endif
                    <div class="tombol-nav">
                            <a href="{{url('user/create')}}" class="btn btn-primary"> Tambah User</a>
                    </div>
                    

    </div>
@stop

@section('footer')
    @include('footer')
@stop
