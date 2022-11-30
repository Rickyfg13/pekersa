@extends('layouts.master')
@section('title', 'Web Pengaduan ATIP - Data Teknisi')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Teknisi</a></li>
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
                        <h4 class="card-title">Data Teknisi</h4>
                        <a href="{{ route('addteknisi') }}" class="btn btn-rounded btn-info"><span
                                class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                            </span>Tambah Data Teknisi</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-datatables">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>No HP</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teknisi as $no => $data)
                                        <tr>
                                            <th>{{ $teknisi->firstItem() + $no }}</th>
                                            <td>{{ $data->nip }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->no_hp }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->password_text }}</td>
                                            <td><a href="{{ route('editteknisi', $data->id_user) }}"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                            </td>
                                            <td><a href="#" data-id="{{ $data->id_user }}"
                                                    class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                                    <form action="{{ route('deleteteknisi', $data->id_user) }}"
                                                        id="delete{{ $data->id_user }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $teknisi->links() }}
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
