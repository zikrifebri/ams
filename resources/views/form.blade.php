   @if ( isset($suratmasuk))
        {!! Form::hidden('id' ,$suratmasuk->id) !!}
    @endif 
                
        
                @if ($errors->any())
                <div class="form-group {{ $errors->has('no_agenda') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('no_agenda' , 'Nomor Agenda:' , ['class' => 'control-label']) !!}
            {!! Form::number('no_agenda' ,  null,  ['class' => 'form-control']) !!}

                @if ($errors->has('no_agenda'))
                <span class="help-block">{{ $errors->first('no_agenda') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('no_surat') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('no_surat' , 'Nomor Surat:' , ['class' => 'control-label']) !!}
            {!! Form::text('no_surat' ,  null,  ['class' => 'form-control']) !!}

                @if ($errors->has('no_surat'))
                <span class="help-block">{{ $errors->first('no_surat') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('id_departement') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
                {!! Form::label('id_departement' , 'Asal Surat:' , ['class' => 'control-label']) !!}
            @if(count($list_departement) > 0 )
                {!! Form::select('id_departement' , $list_departement, null,  ['class' => 'form-control', 'id'=> 'id_departement',
                'placeholder' => 'Pilih Asal Surat']) !!}
            @else
                <p>Tidak Ada Pilihan Asal Surat</p>
            @endif
                @if ($errors->has('id_departement'))
                <span class="help-block">{{ $errors->first('id_departement') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('perihal') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('perihal' , 'Perihal Surat:' , ['class' => 'control-label']) !!}
            {!! Form::text('perihal' ,  null,  ['class' => 'form-control']) !!}
                
                @if ($errors->has('perihal'))
                <span class="help-block">{{ $errors->first('perihal') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('kode') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('kode' , 'Kode:' , ['class' => 'control-label']) !!}
            {!! Form::text('kode' ,  null,  ['class' => 'form-control']) !!}
                
                @if ($errors->has('kode'))
                <span class="help-block">{{ $errors->first('kode') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('tgl_surat') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('tgl_surat' , 'Tanggal Surat:' , ['class' => 'control-label']) !!}
            {!! Form::date('tgl_surat' ,  !empty($suratmasuk) ? $suratmasuk->tgl_surat->format('Y-m-d'): null,  ['class' => 'form-control' , 'id' => 'tgl_surat']) !!}
                
                @if ($errors->has('tgl_surat'))
                <span class="help-block">{{ $errors->first('tgl_surat') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('tgl_diterima') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('tgl_diterima' , 'Tanggal Diterima:' , ['class' => 'control-label']) !!}
            {!! Form::date('tgl_diterima' ,  !empty($suratmasuk) ? $suratmasuk->tgl_diterima->format('Y-m-d'): null,  ['class' => 'form-control' , 'id' => 'tgl_diterima']) !!}

                @if ($errors->has('tgl_diterima'))
                <span class="help-block">{{ $errors->first('tgl_diterima') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('keterangan' , 'Keterangan:' , ['class' => 'control-label']) !!}
            {!! Form::text('keterangan' ,  null,  ['class' => 'form-control']) !!}

                @if ($errors->has('keterangan'))
                <span class="help-block">{{ $errors->first('keterangan') }}</span>
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('file') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
                {!! Form::label('file' , 'File:') !!}
                {!! Form::file('file') !!}

                @if ($errors->has('file'))
                <span class="help-block">{{ $errors->first('file') }}</span>
                @endif

                @if (isset($suratmasuk))
                    @if (isset($suratmasuk->file))
                        <a href="{{ asset('fileupload/'. $suratmasuk->file) }}">{{ $suratmasuk->file }}</a>
                    @endif
                @endif
                </div>

                @if ($errors->any())
                <div class="form-group {{ $errors->has('users_id') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            @if(count($user_list) > 0 )
                <label for="users_id">Tujuan Surat:</label>
                {{-- <select name="users_id" id="users_id" class="form-control">
                    @foreach ($user_list as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select> --}}
                <select name="users_id" id="users_id" class="form-control"></select>
            @else
                <p>Tidak Ada Pilihan Tujuan Surat</p>
            @endif
                @if ($errors->has('users_id'))
                <span class="help-block">{{ $errors->first('users_id') }}</span>
                @endif
                </div>
                
                <div class="form-group">
                {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
                </div>
    
