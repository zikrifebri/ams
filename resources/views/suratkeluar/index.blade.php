@extends('include.template')

@section('main')
    <div id="suratkeluar">
        <br>
    <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <div>Surat Keluar
                                <div class="page-title-subheading">Data Seluruh Surat Keluar</div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
            @include('suratkeluar.form_pencarian')
            @if (!empty($suratkeluar_list))
                <table class="table">
                    <thead>
                        <tr>
                            <th width="15%">No.Surat<br/>Tanggal Surat</th>
                            <th width="33%">Perihal Surat<br/>File</th>
                            <th width="22%">Tujuan <br>Tgl Diterima</th>
                            <th width="20%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($suratkeluar_list as $suratkeluar): ?>
                            <tr>
                                <td>{{ $suratkeluar->no_surat }}<br/><hr/>{{ $suratkeluar->tgl_surat->format('d-m-Y') }}</td>
                                <td>{{ $suratkeluar->perihal }}<br/><br/> <strong>File :</strong>
                                    @if (isset($suratkeluar))
                                        @if (isset($suratkeluar->file))
                                            {{ link_to('surat-keluar/' . $suratkeluar->id, $suratkeluar->file)}}
                                        @else 
                                            <em>Tidak ada file yang di upload</em>
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $suratkeluar->departement->nama_departement }} <small class="{{ $suratkeluar->status_diterima == 0 ? 
                                'text-warning': 'text-success' }}">{{ $suratkeluar->status_diterima == 0 ? 'Belum diterima': 'Diterima' }}</small>
                                @if ($suratkeluar->status_diterima == 1)
                                    <br/><small>{{ $suratkeluar->tbl_surat_masuk->tgl_diterima->format('d-m-Y') }}</small></td>
                                @endif
                                <td>
                                    @if (Auth::user()->level == 'operator')
                                        @if ($suratkeluar->status_diterima == 0)                                   
                                            <div class="box-button">
                                                {{ link_to('surat-keluar/' . $suratkeluar->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm', '']) }}
                                            </div>
                                            <div class="box-button">
                                                <button type="submit" name="delete_sk_sm" id-surat-keluar="{{ $suratkeluar->id }}" 
                                                    data-url="{{ route('sk.delete') }}" id="delete_sk_sm" class="btn btn-danger btn-sm">Delete</button>
                                            </div>
                                        @endif
                                    @endif
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
                            <strong> Jumlah Surat : {{ $jumlah_suratkeluar }} </strong>
                    </div>
                    <div class="paging">
                            {{ $suratkeluar_list->links() }}
                    </div>
                </div>
                @if (auth()->user()->level === 'operator')
                    <div class="tombol-nav">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#createsk"> Tambah Surat</a>
                    </div>
                @endif
                    
    <!-- modal on -->
        <div class="modal fade" id="createsk" tabindex="-1" role="dialog" aria-labelledby="createskLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="createskLabel">Tambah Data Surat Keluar</h2>
                    </div>

                {!! Form::open(['url' => 'suratkeluar', 'files'=>true]) !!}
                
                <div class="modal-body">

                @include('suratkeluar.form', ['submitButtonText' => 'Simpan'])
                
                </div>
            
                {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    <!-- modal off -->

    </div>
@stop

@section('footer')
    @include('footer')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
<script>
            $(document).ready(function() {
            $('#delete_sk_sm').click(function() {
                var url = $(this).data('url');
                var id = $(this).attr('id-surat-keluar');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Success',
                                    'Surat dihapus',
                                    'success'
                                );

                                location.reload();
                            }
                        })
                    }
                });
            });

        });
</script>
@stop
