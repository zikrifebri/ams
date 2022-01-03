<div id="pencarian">
            {!! Form::open(['url' => 'cari', 'method' => 'GET', 'id' => 'form-pencarian']) !!}

            <div class="row">
                <div class="col-md-2">
                {!! Form::select('id_departement', $list_departement,
                (! empty($id_departement) ? $id_departement : null),
                ['id' => 'id_departement', 'class' => 'form-control',
                'placeholder' => '-Asal Surat-']) !!}
                </div>

                <div class="col-md-4">
                <div class="input-group">
                {!! Form:: text('kata_kunci', (! empty($kata_kunci)) 
                ? $kata_kunci : null, ['class' => 'form-control', 
                'placeholder' => 'Tulis No Surat...'])  !!}
                <span class="input-group-btn">
                {!! Form::button('Cari', ['class' =>
                 'btn btn-default', 'type' => 'submit']) !!}
                </span>
                </div>
                </div>
            </div>
            {!! Form::close() !!}
</div>
