@extends('layouts.main')

@section('title', $c_menu->title)

@section('styles')
    <!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ asset('/js/datatables/datatables.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/select2/select2-bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('/js/sweet-alert2/sweetalert2.min.css') }}" type="text/css">
@endsection

@section('scripts')
    <!-- Imported scripts on this page -->
    <script src="{{ asset('/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('/js/sweet-alert2/sweetalert2.min.js') }}"></script>

    {{-- Data Table --}}
    <script type="text/javascript">
        jQuery( document ).ready( function( $ ) {
            var $table4 = jQuery( "#table-4" );
            
            $table4.DataTable( {
                aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                bStateSave: true,
                dom: 'lBfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                scrollCollapse: true,
                // scrollX: true,
                // autoWidth: true,
            } );

            // Initalize Select Dropdown after DataTables is created
			$table4.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
        } );		
    </script>

    {{-- Sweet Alert --}}
    <script type="text/javascript">
        $('.sa-warning').click(function(e) {
            var form = $(this).closest('form')
            e.preventDefault()

            swal({
                title: 'Apakah Kamu Yakin?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success text-white',
                cancelButtonClass: 'btn btn-danger m-l-10',
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batal',
            }).then(function() {
                swal(
                    'Terhapus!',
                    'Data berhasil dihapus.',
                    'success',
                ).then(function() {
                    form.submit()
                })
            })
        })
    </script>
@endsection

@section('content')
    <ol class="breadcrumb bc-3" >
        <li>
        <a href="/"><i class="fa-home"></i>Dashboard</a>
        </li>
        <li>
            <a href="#">Pengaturan</a>
        </li>
        <li class="active">
            <strong>{{ $c_menu->title }}</strong>
        </li>
    </ol>

    <div class="row">
        <div class="col-lg-8">
            <h2>Daftar {{ $c_menu->title }}</h2>
        </div>
        <div class="col-lg-4 pt-2 text-right">
            <a href="{{ $c_menu->url }}/create" class="btn btn-primary">TAMBAH</a>
        </div>
    </div>

    @if (session('status'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Sukses - </strong> {{ session('status') }}
                </div>
            </div>
        </div>
    @endif 

    <table class="table table-bordered datatable" id="table-4" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Peran</th>
                <th>Judul</th>
                <th>Nama Modul</th>
                <th>Nama Tabel</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($data)
                @foreach ($data as $item)
                    <tr class="odd gradeX">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>
                            @if ($item->role)
                                {{ $item->role->name }}
                            @endif
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->module_name }}</td>
                        <td>{{ $item->table_name }}</td>
                        <td>{{ $item->condition }}</td>
                        <td class="text-center">
                            @if ($access->edit == 1)
                                <a href="{{ $c_menu->url }}/{{ $item->id }}/edit" class="text-success"><i class="entypo-pencil"></i></a>
                            @endif
                            @if ($access->delete == 1)
                                <form action="{{ $c_menu->url }}/{{ $item->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button id="delete" type="submit" class="text-danger sa-warning" style="border: 0px; background: 0%"><i class="entypo-trash"></i></button>
                                </form>
                            @endif
                            @if ($access->detail == 1)
                                <a href="{{ $c_menu->url }}/{{ $item->id }}" class="text-info"><i class="entypo-eye"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection