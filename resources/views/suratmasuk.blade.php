@extends('include.template')

@section('main')
    <div id="suratmasuk">
       <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div>Surat Masuk
                            <div class="page-title-subheading">Data Seluruh Surat Masuk</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            @include('form_pencarian')
            @if (!empty($suratmasuk_list))
                <table class="table">
                    <thead>
                        <tr>
                            <th width="13%">No.Surat<br/>Tgl Surat</th>
                            <th width="30%">Perihal Surat<br/>File</th>
                            <th width="18%">Asal Surat</th>
                            @if (auth()->user()->level != 'user')
                                <th width="20%">Proses Disposisi <br> Isi Pesan </th>
                            @endif
                            <th width="18%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($suratmasuk_list as $suratmasuk): ?>
                            <tr>
                                <td>{{ $suratmasuk->no_surat }}<br/><hr/>{{ $suratmasuk->tgl_surat->format('d-m-Y') }}</td>
                                <td>{{ $suratmasuk->perihal }}<br/><br/><strong>File :</strong>
                                    @if (isset($suratmasuk))
                                        @if (isset($suratmasuk->file))
                                            {{ link_to('surat-masuk/' . $suratmasuk->id, $suratmasuk->file)}}
                                        @else 
                                            <em>Tidak ada file yang di upload</em>
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $suratmasuk->asal_surat_departement->nama_departement }} 
                                @if (auth()->user()->level == 'operator')
                                    <div class="box-button">
                                        <button class="btn btn-success btn-sm" name="status_diterima" 
                                        data-id="{{ $suratmasuk->tbl_surat_keluar_id }}" id-surat-masuk="{{ $suratmasuk->id }}" 
                                        id="status_diterima" {{ $suratmasuk->tgl_diterima !== null ? 'disabled': '' }}>
                                         Diterima</button>
                                    </div>
                                    
                                    @endif
                                </td>
                                <td>
                                @if (auth()->user()->level != 'user')
                                    @if ($suratmasuk->proses_disp === 1)
                                        <small class="text-success">Diterima </small>  <br> {{$suratmasuk->disposisi == null ? '-': 
                                        $suratmasuk->disposisi->pesan}}
                                    @elseif ($suratmasuk->proses_disp === 2)
                                        <small class="text-danger"> Ditolak  </small><br> {{$suratmasuk->disposisi == null ? '-': 
                                        $suratmasuk->disposisi->pesan}}
                                    @else
                                        <small class="text-warning"> Sedang Diproses </small> 
                                    @endif
                                @endif
                                </td>
                                <td><br>
                                @if (auth()->user()->level == 'operator')
                                    
                                    <div class="box-button">
                                        <select name="terusan_user_id" id="terusan_user_id" class="form-control"
                                        {{ $suratmasuk->status_terusan == 1 ? 'disabled': '' }}
                                        {{ $suratmasuk->proses_disp == 0 ? 'disabled': '' }}
                                        {{ $suratmasuk->proses_disp == 2 ? 'disabled': '' }}>
                                            <option value="all">Semua Pegawai</option>
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->username }} - {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="box-button">
                                        <button class="btn btn-success btn-sm" name="terusan_user" data-id="{{ $suratmasuk->id }}"  
                                        id="terusan_user" {{ $suratmasuk->status_terusan == 1 ? 'disabled': '' }} 
                                        {{ $suratmasuk->proses_disp == 0 ? 'disabled': '' }}
                                        {{ $suratmasuk->proses_disp == 2 ? 'disabled': '' }}> Kirim</button>
                                    </div>
                                @elseif(auth()->user()->level == 'kepala')
                                   @empty($suratmasuk->disposisi)
                                    
                                       @empty($suratmasuk->disposi->pesan)
                                        <div class="box-button">
                                            <button class="btn btn-success btn-sm" data-id="{{ $suratmasuk->id }}" id="tombol-isi-pesan" name="isipesan" data-toggle="modal" 
                                            data-target="#isipesan" disabled> Isi Pesan</button>
                                        </div>
                                       @endempty
                                    @else
                                       @if ($suratmasuk->disposisi->pesan == null)
                                       <div class="box-button">
                                        <button class="btn btn-success btn-sm" data-id="{{ $suratmasuk->id }}" id="tombol-isi-pesan" name="isipesan" data-toggle="modal" 
                                        data-target="#isipesan"> Isi Pesan</button>
                                    </div>
                                        @else
                                        <div class="box-button">
                                            <button class="btn btn-success btn-sm" data-id="{{ $suratmasuk->id }}" id="tombol-isi-pesan" name="isipesan" data-toggle="modal" 
                                            data-target="#isipesan" disabled> Isi Pesan</button>
                                        </div>
                                       @endif
                                    @endempty
                                @endif
                                                      
                                {{-- @endif --}}
                                </td>
                            </tr>
                            <?php endforeach ?>
                    </tbody>
                </table>
            @else
                <p>Tidak Ada Data Surat</p>
                @endif
                <div class="table-nav">
                    <div class="jumlah-data">
                            <strong> Jumlah Surat : {{ $jumlah_suratmasuk }} </strong>
                    </div>
                    <div class="paging">
                            {{ $suratmasuk_list->links() }}
                    </div>
                </div>
                {{-- @if (Auth::check() && Auth::user()->level == 'user')
                    <button type="button" class="btn btn-primary"" disabled="disabled">Tambah Surat</button>
                @else
                    <div class="tombol-nav">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#createsm"> Tambah Surat</a>
                    </div>
                @endif --}}
                
    <!-- modal tambah surat on -->
        <div class="modal fade" id="createsm" tabindex="-1" role="dialog" aria-labelledby="createsmLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title" id="createsmLabel">Tambah Data Surat Masuk</h2>
                    </div>

                {!! Form::open(['url' => 'suratmasuk', 'files'=>true]) !!}
                
                <div class="modal-body">

                {{-- @include('form', ['submitButtonText' => 'Simpan']) --}}
                
                </div>
            
                {!! Form::close() !!}

                </div>
            </div>
        </div>
    <!-- modal off -->


        <!-- Modal -->
        <div class="modal fade" id="isipesan" tabindex="-1" role="dialog" aria-labelledby="isipesanLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('tbl_surat_masuk.simpan_pesan') }}" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="isipesanLabel">Pesan</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id_tbl_sm" id="id_tbl_sm">
                    <div class="form-group">
                        <input type="text" name="inputisipesan" class="form-control" id="inputisipesan" placeholder="Isi Pesan">
                    </div>
                    <div class="form-groub">
                        <label class="radio-inline">
                            <input type="radio" name="status_pesan" id="inlineRadio1" value="1"> Diterima
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status_pesan" id="inlineRadio2" value="2"> Ditolak
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="tombol-simpan" id="tombol-simpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>

    </div>

@stop

@section('footer')
    @include('footer')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('body').on('click','#terusan_user', function() {
                var user_id = $('#terusan_user_id').val();
                var id = $(this).data('id');
                console.log(user_id);
                console.log(id);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('terusan.simpan') }}",
                            type: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                user_id: user_id,
                                id: id
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Success',
                                    'Surat diteruskan!',
                                    'success'
                                );

                                location.reload();
                            }
                        })
                    }
                });
            });

            $('body').on('click','#status_diterima', function() {
                var id = $(this).data('id');
                var id_surat_masuk = $(this).attr('id-surat-masuk');
                console.log(id);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('status_diterima.update') }}",
                            type: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id,
                                id_surat_masuk: id_surat_masuk
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Success',
                                    'Surat diterima!',
                                    'success'
                                );

                                location.reload();
                            }
                        })
                    }
                });
            });

            $('body').on('change','#id_departement',function() {
                var id_departement = $(this).find(":selected").val();
                $('#users_id').empty();
                console.log(id_departement);
                $.get("surat-masuk/departement/"+id_departement, function(data) {
                    console.log(data);
                    for (var index = 0; index < data.length; index++) {
                        $('#users_id').append('<option value="' + data[index].id + '">' + data[index].name + '</option>');
                    }
                });
            });

            // if ($("#isipesan").length > 0) {
            //     $("#isipesan").validate({
            //         submitHandler: function (form) {
            //             var actionType = $('#tombol-simpan').val();
            //             $('#tombol-simpan').html('Sending..');
            //             var f = $('#isipesan')[0];
            //             var data = new FormData(f);
            //             $.ajax({
            //                 data: data,
            //                 processData: false,
            //                 contentType: false,
            //                 cache: false,
            //                 timeout: 600000,
            //                 url: "{{ route('tbl_surat_masuk.simpan_pesan') }}", //url simpan data
            //                 type: "POST", //karena simpan kita pakai method POST
            //                 success: function (data) { //jika berhasil
            //                     $('#isipesan').trigger("reset"); //form reset
            //                     $('#addUtamaModal').modal('hide'); //modal hide
            //                     $('#tombol-simpan').html('Simpan'); //tombol simpan
            //                     var oTable = $('#dt-paket').dataTable(); //inialisasi datatable
            //                     oTable.fnDraw(false); //reset datatable
            //                     iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
            //                         title: 'Successfully',
            //                         message: 'Berhasil menambah data',
            //                         position: 'bottomRight'
            //                     });
            //                 },
            //                 error: function (data) { //jika error tampilkan error pada console
            //                     console.log('Error:', data);
            //                     $('#tombol-simpan').html('Simpan');
            //                 }
            //             });
            //         }
            //     })
            // }

        $('body').on('click', '#tombol-isi-pesan', function () {
            var data_id = $(this).data('id');
            console.log(data_id);
            $.get('tbl_surat_masuk/isi_pesan/edit/' + data_id, function (data) {
                console.log(data.tbl_surat_masuk_id);
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#isipesan').modal('show');
                $('#isipesan')[0].reset;
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                $('#id_tbl_sm').val(data.tbl_surat_masuk_id);
            })
        });
        });
    </script>
@stop

