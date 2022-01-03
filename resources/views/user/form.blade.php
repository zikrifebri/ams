    @if ( isset($user))
        {!! Form::hidden('id' ,$user->id) !!}
    @endif 
                
                
                @if ($errors->any())
                <div class="form-group {{ $errors->has('username') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('username' , 'Username :' , ['class' => 'control-label']) !!}
            {!! Form::text('username' ,  null,  ['class' => 'form-control']) !!}
                @if ($errors->has('username'))
                <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('password' , 'Password :' , ['class' => 'control-label']) !!}<h6>*Harus Diisi</h6>
            {{-- <label class="control_label" for="password">Password <h6>*Harus Diisi</h6></label> --}}
            {!! Form::password('password' ,  ['class' => 'form-control']) !!}
                @if ($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('password_confirmation' , 'Password Confirmation :' , ['class' => 'control-label']) !!}
            {!! Form::password('password_confirmation' ,  ['class' => 'form-control']) !!}
                @if ($errors->has('password_confirmation'))
                <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('name') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('name' , 'Nama :' , ['class' => 'control-label']) !!}
            {!! Form::text('name' ,  null,  ['class' => 'form-control']) !!}
                @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('nip') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('nip' , 'Nip :' , ['class' => 'control-label']) !!}
            {!! Form::text('nip' ,  null,  ['class' => 'form-control']) !!}
                @if ($errors->has('nip'))
                <span class="help-block">{{ $errors->first('nip') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('id_departement') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
                @if(count($list_departement) > 0 )
                    <label for="id_departement">Departement :</label>
                        <select name="id_departement" id="id_departement" class="form-control">
                            @foreach ($list_departement as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_departement }}</option>
                            @endforeach
                        </select>
                @else
                    <p>Tidak Ada Pilihan Departement</p>
                @endif
                @if ($errors->has('id_departement'))
                <span class="help-block">{{ $errors->first('id_departement') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('level') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('level' , 'Pilih Tipe User :' , ['class' => 'control-label']) !!}
                <div class="radio">
                    <label>{!! Form::radio('level' ,  'admin') !!} Admin </label>
                </div>
                <div class="radio">
                    <label>{!! Form::radio('level' ,  'kepala') !!} Kepala Departement </label>
                        </div>
                <div class="radio">
                    <label>{!! Form::radio('level' ,  'operator') !!} Operator </label>
                </div>
                <div class="radio">
                    <label>{!! Form::radio('level' ,  'user') !!} User </label>
                </div>
                @if ($errors->has('level'))
                <span class="help-block">{{ $errors->first('level') }}</span>
                @endif
                </div>

                <div class="form-group">
                {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
                </div>
    
