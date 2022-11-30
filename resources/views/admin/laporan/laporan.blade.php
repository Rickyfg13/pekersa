@extends('layouts.master')
@section('title', 'Web Pengaduan ATIP - Data Pengaduan')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Laporan</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Pengaduan</a></li>
                </ol>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                        fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                class="mdi mdi-close"></i></span>
                    </button>
                </div>
                <!-- <button type="button" class="close" data-dismiss="alert">×</button>     -->

        </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                </svg>
                <strong>{{ $message }}</strong>
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                            class="mdi mdi-close"></i></span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pengaduan</h4>
                        <a href="{{ route('laporan.print') }}" class="btn btn-rounded btn-info" target="_blank"><span
                                class="btn-icon-left text-info"><i class="fa fa-file color-info"></i>
                            </span>Print Laporan</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-datatables">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        {{-- <th>Tipe Pengaduan</th> --}}
                                        <th>Jenis Pengaduan</th>
                                        <th>Nama Pengadu</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Teknisi</th>
                                        <th>Status Pengaduan</th>
                                        <th>Biaya Pengaduan</th>
                                        <th>Keterangan Pengaduan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $no => $data)
                                        <tr>
                                            <th>{{ $no+1}}
                                            
                                            </th>
                                            {{-- <td>
                                                @if($data->tipe === null)
                                                   Normal 
                                                @else
                                                    {{ $data->tipe }}
                                                @endif

                                            </td> --}}
                                            <td>
                                                @if ($data->id_jenis == 4)
                                                    Sarana
                                                @elseif($data->id_jenis == 5)
                                                    Prasarana
                                                @else
                                                    Kamtibmas
                                                @endif
                                            </td>
                                            <td>

                                                {{ $data->a_nama }}

                                            </td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td> @if($data->deskripsi === null)
                                                -
                                             @else
                                                 {{ $data->deskripsi }}
                                             @endif</td>

                                            <td><img src="{{ asset('image/berkas/' . $data->foto) }}" width="100px"
                                                    lenght="100px"></td>

                                            <td>
                                                @if ($data->id_teknisi == null)
                                                    <a href="{{ route('pilihteknisi', $data->id_laporan) }}"
                                                        class="btn btn-rounded btn-info"><span
                                                            class="btn-icon-left text-info"><i
                                                                class="fa fa-plus color-info"></i>
                                                        @else
                                                            {{ $data->b_nama }}
                                                @endif
                                                </span></a>
                                            </td>
                                            <td>
                                                @if ($data->status == 1)
                                                    Mulai
                                                @elseif($data->status == 2)
                                                    Proses
                                                @else
                                                    Selesai
                                                @endif
                                            </td>
                                            <td>Rp.{{ $data->biaya }}</td>
                                            <td> 
                                                @if($data->status == 1)
                                                <a href="{{ route('statuslaporan', $data->id_laporan) }}"
                                                    class="btn btn-rounded btn-info"><span
                                                        class="btn-icon-left text-info"><i class="fa fa-eye color-info"></i>
                                                    </span>
                                                </a>
                                                @elseif($data->status == 2)
                                                <a href="{{ route('statuslaporan', $data->id_laporan) }}"
                                                    class="btn btn-rounded btn-info"><span
                                                        class="btn-icon-left text-info"><i class="fa fa-eye color-info"></i>
                                                    </span>
                                                </a>
                                                @else
                                                -
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $laporan->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('page-scripts')
    <script src="{{ asset('base/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
@endpush
@push('after-scripts')
    <script>
        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id;
            swal({
                    title: 'Yakin hapus data?',
                    text: 'Data yang dihapus tidak bisa dikembalikan',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal('Data berhasil dihapus', {
                            icon: 'success',
                        });
                        $(`#delete${id}`).submit();
                    } else {
                        swal('Data batal dihapus');
                    }
                });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.table-datatables').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
@endpush
