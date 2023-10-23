@extends('layouts.main')

@section('title', $c_menu->title)


@section('styles')
    <!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ asset('/js/datatables/datatables.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/select2/select2-bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('/js/sweet-alert2/sweetalert2.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('/js/icheck/skins/minimal/_all.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/icheck/skins/square/_all.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/icheck/skins/flat/_all.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/icheck/skins/futurico/futurico.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/icheck/skins/polaris/polaris.css') }}">
@endsection

@section('scripts')
    <!-- Imported scripts on this page -->
    <script src="{{ asset('/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('/js/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/js/moment.min.js') }}"></script>
    <script src="{{ asset('/js/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('/js/neon-chat.js') }}"></script>

    <script type="text/javascript">
        jQuery( document ).ready( function( $ ) {
            var $table1 = jQuery( "#table-1" );
            
            $table1.DataTable( {
                aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                bStateSave: true,  
                // scrollX: true,
                // autoWidth: true,
            } );

            // Initalize Select Dropdown after DataTables is created
			$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
        } );		
    </script>

    {{-- Multi Check Box --}}
    <script type="text/javascript">
        $('input[type="checkbox"]').click(function() {
            if (this.checked)
            {
                $input = $('input[data-id="'+this.getAttribute('id')+'"]')
                $input.val(1)
                console.log($input.val())
            }
            else
            {
                $input = $('input[data-id="'+this.getAttribute('id')+'"]')
                $input.val(0)
                console.log($input.val())
            }
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
        <div class="col-lg-12 col-xs-12">
            <h2>Ubah {{ $c_menu->title }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-primary" data-collapsed="0">
            
                <div class="panel-heading">
                    <div class="panel-title">
                        Ubah {{ $c_menu->title }}
                    </div>
                    
                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>
                
                <div class="panel-body">
                    
                    <form role="form" method="POST" action="{{ $c_menu->url }}/{{ $detail[0]->group_menu_id }}" class="form-horizontal form-groups-bordered">
                        @csrf
                        @method('PUT')
                        <div class="row form-group pt-0">
                            <div class="col-lg-12 col-xs-12 mb-5">
                                <label for="group_menu" class="control-label">Grup Menu</label>
                                <input type="hidden" name="group_menu" value="{{ $detail[0]->group_menu_id }}">
                                <input type="text" id="group_menu" class="form-control" value="{{ $detail[0]->group_menu->name }}" disabled>
                            </div>
                            <div class="col-lg-12 col-xs-12 mb-5">
                                <label for="group_menu" class="control-label">Menu Akses</label>
                                <table id="table-1" class="table table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Menu</th>
                                            <th>Lihat</th>
                                            <th>Tambah</th>
                                            <th>Ubah</th>
                                            <th>Hapus</th>
                                            <th>Detail</th>
                                            <th>Approve</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($detail)
                                            @foreach ($detail as $item)
                                                @if ($item->menu_id == 0)
                                                    <tr>
                                                        <td width="50%">
                                                            {{ $item->main_menu->title }}
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="view_{{ $item->id }}" name="view_{{ $item->id }}" value="1" @if (old('view_' . $item->id, $item->view) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="add_{{ $item->id }}" name="add_{{ $item->id }}" value="1" @if (old('add_' . $item->id, $item->add) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="edit_{{ $item->id }}" name="edit_{{ $item->id }}" value="1" @if (old('edit_' . $item->id, $item->edit) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="delete_{{ $item->id }}" name="delete_{{ $item->id }}" value="1" @if (old('delete_' . $item->id, $item->delete) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="detail_{{ $item->id }}" name="detail_{{ $item->id }}" value="1" @if (old('detail_' . $item->id, $item->detail) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="approval_{{ $item->id }}" name="approval_{{ $item->id }}" value="1" @if (old('approval_' . $item->id, $item->approval) == 1) checked @endif>
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td width="50%">
                                                            {{ $item->main_menu->title }} / {{ $item->menu->title }}
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="view_{{ $item->id }}" name="view_{{ $item->id }}" value="1" @if (old('view_' . $item->id, $item->view) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="add_{{ $item->id }}" name="add_{{ $item->id }}" value="1" @if (old('add_' . $item->id, $item->add) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="edit_{{ $item->id }}" name="edit_{{ $item->id }}" value="1" @if (old('edit_' . $item->id, $item->edit) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="delete_{{ $item->id }}" name="delete_{{ $item->id }}" value="1" @if (old('delete_' . $item->id, $item->delete) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="detail_{{ $item->id }}" name="detail_{{ $item->id }}" value="1" @if (old('detail_' . $item->id, $item->detail) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="approval_{{ $item->id }}" name="approval_{{ $item->id }}" value="1" @if (old('approval_' . $item->id, $item->approval) == 1) checked @endif>
                                                        </td>
                                                    </tr>
                                                @endif                                                
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                @if ($detail)
                                    @foreach ($detail as $item)
                                        @if ($item->menu_id == 0)
                                            <input type="hidden" data-id="id_{{ $item->id }}" name="id_{{ $item->id }}" value="{{ $item->id }}">
                                            <input type="hidden" data-id="main_menu_{{ $item->id }}" name="main_menu_{{ $item->id }}" value="{{ $item->main_menu->id }}">
                                            <input type="hidden" data-id="menu_{{ $item->id }}" name="menu_{{ $item->id }}" value="0">
                                            <input type="hidden" data-id="view_{{ $item->id }}" name="view_{{ $item->id }}" value="{{ old('view_' . $item->id, $item->view) }}">
                                            <input type="hidden" data-id="add_{{ $item->id }}" name="add_{{ $item->id }}" value="{{ old('add_' . $item->id, $item->add) }}">
                                            <input type="hidden" data-id="edit_{{ $item->id }}" name="edit_{{ $item->id }}" value="{{ old('edit_' . $item->id, $item->edit) }}">
                                            <input type="hidden" data-id="delete_{{ $item->id }}" name="delete_{{ $item->id }}" value="{{ old('delete_' . $item->id, $item->delete) }}">
                                            <input type="hidden" data-id="detail_{{ $item->id }}" name="detail_{{ $item->id }}" value="{{ old('detail_' . $item->id, $item->detail) }}">
                                            <input type="hidden" data-id="approval_{{ $item->id }}" name="approval_{{ $item->id }}" value="{{ old('approval_' . $item->id, $item->approval) }}">
                                        @else
                                            <input type="hidden" data-id="id_{{ $item->id }}" name="id_{{ $item->id }}" value="{{ $item->id }}">
                                            <input type="hidden" data-id="main_menu_{{ $item->id }}" name="main_menu_{{ $item->id }}" value="{{ $item->main_menu->id }}">
                                            <input type="hidden" data-id="menu_{{ $item->id }}" name="menu_{{ $item->id }}" value="{{ $item->menu->id }}">
                                            <input type="hidden" data-id="view_{{ $item->id }}" name="view_{{ $item->id }}" value="{{ old('view_' . $item->id, $item->view) }}">
                                            <input type="hidden" data-id="add_{{ $item->id }}" name="add_{{ $item->id }}" value="{{ old('add_' . $item->id, $item->add) }}">
                                            <input type="hidden" data-id="edit_{{ $item->id }}" name="edit_{{ $item->id }}" value="{{ old('edit_' . $item->id, $item->edit) }}">
                                            <input type="hidden" data-id="delete_{{ $item->id }}" name="delete_{{ $item->id }}" value="{{ old('delete_' . $item->id, $item->delete) }}">
                                            <input type="hidden" data-id="detail_{{ $item->id }}" name="detail_{{ $item->id }}" value="{{ old('detail_' . $item->id, $item->detail) }}">
                                            <input type="hidden" data-id="approval_{{ $item->id }}" name="approval_{{ $item->id }}" value="{{ old('approval_' . $item->id, $item->approval) }}">
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12 text-right">
                                <a href="{{ $c_menu->url }}" class="btn btn-warning">KEMBALI</a>
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            
            </div>
        
        </div>
    </div>
@endsection