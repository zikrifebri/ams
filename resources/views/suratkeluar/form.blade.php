    @if ( isset($suratkeluar))
        {!! Form::hidden('id' ,$suratkeluar->id) !!}
    @endif 
                
{{--                 
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
                </div> --}}

                @if ($errors->any())
                <div class="form-group {{ $errors->has('id_departement') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
                {!! Form::label('id_departement' , 'Tujuan:' , ['class' => 'control-label']) !!}
            @if(count($list_departement) > 0 )
                {!! Form::select('id_departement' , $list_departement, null,  ['class' => 'form-control', 'id'=> 'id_departement',
                'placeholder' => 'Pilih Tujuan']) !!}
            @else
                <p>Tidak Ada Pilihan Tujuan</p>
            @endif
                @if ($errors->has('id_departement'))
                <span class="help-block">{{ $errors->first('id_departement') }}</span>
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

                {{-- @if ($errors->any())
                <div class="form-group {{ $errors->has('kode') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('kode' , 'Kode:' , ['class' => 'control-label']) !!}
            {!! Form::text('kode' ,  null,  ['class' => 'form-control']) !!}
                
                @if ($errors->has('kode'))
                <span class="help-block">{{ $errors->first('kode') }}</span>
                @endif
                </div> --}}

                @if ($errors->any())
                <div class="form-group {{ $errors->has('tgl_surat') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('tgl_surat' , 'Tanggal Surat:' , ['class' => 'control-label']) !!}
            {!! Form::date('tgl_surat' ,  !empty($suratkeluar) ? $suratkeluar->tgl_surat->format('Y-m-d'): null,  
            ['class' => 'form-control' , 'id' => 'tgl_surat']) !!}
                
                @if ($errors->has('tgl_surat'))
                <span class="help-block">{{ $errors->first('tgl_surat') }}</span>
                @endif
                </div>

                {{-- @if ($errors->any())
                <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
            {!! Form::label('keterangan' , 'Keterangan:' , ['class' => 'control-label']) !!}
            {!! Form::text('keterangan' ,  null,  ['class' => 'form-control']) !!}

                @if ($errors->has('keterangan'))
                <span class="help-block">{{ $errors->first('keterangan') }}</span>
                @endif
                </div> --}}

                @if ($errors->any())
                <div class="form-group {{ $errors->has('file') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                @endif
                {!! Form::label('file' , 'File:') !!}
                {!! Form::file('file' ) !!}

                @if ($errors->has('file'))
                <span class="help-block">{{ $errors->first('file') }}</span>
                @endif

                @if (isset($suratkeluar))
                    @if (isset($suratkeluar->file))
                        <a href="{{ asset('fileupload/'. $suratkeluar->file) }}">{{ $suratkeluar->file }}</a>
                    @endif
                @endif
                </div>


                <div class="form-group">
                {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
                </div>
    
