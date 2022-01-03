    @if ( isset($departement))
        {!! Form::hidden('id' ,$departement->id) !!}
    @endif 
                
                
                @if ($errors->any())
                <div class="form-group {{ $errors->has('nama_departement') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('nama_departement' , 'Departement:' , ['class' => 'control-label']) !!}
            {!! Form::text('nama_departement' ,  null,  ['class' => 'form-control']) !!}

                @if ($errors->has('nama_departement'))
                <span class="help-block">{{ $errors->first('nama_departement') }}</span>
                @endif
                </div>

                <div class="form-group">
                {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
                </div>
    
