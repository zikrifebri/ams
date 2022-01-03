@extends('include.template')

@section('main')
    <div id="departement">
            <h2>Departement</h2>

            @if (count($departement_list) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Departement</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0 ?>
                        <?php foreach($departement_list as $departement): ?>
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $departement->nama_departement }}</td>
                                <td>
                                <div class="box-button">
                                    {{ link_to('departement/' . $departement->id . '/edit', 'Edit', 
                                    ['class' => 'btn btn-warning btn-sm']) }}
                                </div>
                                <div class="box-button">
                                    {!! Form::open(['method' => 'DELETE', 'action' => 
                                    ['asController@destroy', $departement->id]]) !!}
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
                <p>Tidak Ada Data Departement</p>
                @endif
                    <div class="tombol-nav">
                            <a href="{{url('departement/create')}}" class="btn btn-primary"> Tambah Departement</a>
                    </div>
                    

    </div>
@stop

@section('footer')
    @include('footer')
@stop
