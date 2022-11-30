@extends('layouts.master')
@section('title', 'Web Pengaduan ATIP - Home')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                </ol>
            </div>
            <!-- row -->
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
            <div class="col-xl-4 col-xxl-4 col-lg-12 col-sm-12">
                <div class="widget-stat card bg-info">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fa fa-file"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Laporan Sarana</p>
                                <h4 class="text-white">{{ $sarana }} Laporan</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-4 col-lg-12 col-sm-12">
                <div class="widget-stat card bg-primary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fa fa-file"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Laporan Prasarana</p>
                                <h4 class="text-white">{{ $prasarana }} Laporan</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-4 col-lg-12 col-sm-12">
                <div class="widget-stat card bg-info">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fa fa-file"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Laporan Kamtibmas</p>
                                <h4 class="text-white">{{ $kamtibmas }} Laporan</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pengaduan Hari Ini</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-datatables">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tipe Pengaduan</th>
                                        <th>Jenis Pengaduan</th>
                                        <th>Nama Pengadu</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        {{-- <th>Tambah Teknisi</th>
                                        <th>Status Pengaduan</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $no => $data)
                                        <tr>
                                            <th>{{ $laporan->firstItem() + $no }}</th>
                                            <td>
                                                @if ($data->tipe === null)
                                                    Normal
                                                @else
                                                    {{ $data->tipe }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->id_jenis == 4)
                                                    Sarana
                                                @elseif($data->id_jenis == 5)
                                                    Prasarana
                                                @else
                                                    Kamtibmas
                                                @endif
                                            </td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>
                                                @if ($data->deskripsi === null)
                                                    -
                                                @else
                                                    {{ $data->deskripsi }}
                                                @endif
                                            </td>

                                            <td><img src="{{ asset('image/berkas/' . $data->foto) }}" width="100px"
                                                    lenght="100px"></td>
                                            {{-- <td>
                                                @if (Session::get('role') == 3)
                                                <a href="{{ route('pilihteknisi', $data->id_laporan) }}"class="btn btn-rounded btn-info">
                                                    <span class="btn-icon-left text-info">
                                                        Tambah Pada Menu
                                                    <i class="fa fa-plus color-info"></i>
                                                @endif
                                                    </span>
                                                </a>
                                            </td>
                                            <td> <a href="{{ route('statuslaporan', $data->id_laporan) }}"
                                                    class="btn btn-rounded btn-info"><span
                                                        class="btn-icon-left text-info"><i class="fa fa-eye color-info"></i>
                                                    </span></a></td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $laporan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>
@endsection
<!-- Slick Slider js -->
<script src="{{asset('frontend/js/slick.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/slick-custom.js')}}"></script>

<!-- Add To Home  js -->
<script src="{{asset('frontend/js/homescreen-popup.js')}}"></script>

<!-- Theme Setting js -->
<script src="{{asset('frontend/js/theme-setting.js')}}"></script>


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


            });
        });
    </script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
@endpush
