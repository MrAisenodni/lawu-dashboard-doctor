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
            <h2>Tambah {{ $c_menu->title }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-primary" data-collapsed="0">
            
                <div class="panel-heading">
                    <div class="panel-title">
                        Tambah {{ $c_menu->title }}
                    </div>
                    
                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>
                
                <div class="panel-body">
                    
                    <form role="form" method="POST" action="{{ $c_menu->url }}" class="form-horizontal form-groups-bordered">
                        @csrf
                        <div class="row form-group pt-0">
                            <div class="col-lg-12 col-xs-12 mb-5">
                                <label for="group_menu" class="control-label">Grup Menu</label>
                                <select id="group_menu" name="group_menu" class="select2 @error('group_menu') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Grup Menu">
                                    <option></option>
                                    @if ($group_menus)
                                        @foreach ($group_menus as $item)
                                            <option value="{{ $item->id }}" @if(old('group_menu') == $item->id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('group_menu')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
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
                                        @if ($main_menus)
                                            @foreach ($main_menus as $main_menu)
                                                @if ($main_menu->is_parent == 0)
                                                    <tr>
                                                        <td width="50%">
                                                            {{ $main_menu->title }}
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="view_{{ $main_menu->id }}" name="view_{{ $main_menu->id }}" value="1" @if (old('view_' . $main_menu->id) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="add_{{ $main_menu->id }}" name="add_{{ $main_menu->id }}" value="1" @if (old('add_' . $main_menu->id) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="edit_{{ $main_menu->id }}" name="edit_{{ $main_menu->id }}" value="1" @if (old('edit_' . $main_menu->id) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="delete_{{ $main_menu->id }}" name="delete_{{ $main_menu->id }}" value="1" @if (old('delete_' . $main_menu->id) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="detail_{{ $main_menu->id }}" name="detail_{{ $main_menu->id }}" value="1" @if (old('detail_' . $main_menu->id) == 1) checked @endif>
                                                        </td>
                                                        <td class="text-center">
                                                            <input tabindex="5" type="checkbox" class="icheck" id="approval_{{ $main_menu->id }}" name="approval_{{ $main_menu->id }}" value="1" @if (old('approval_' . $main_menu->id) == 1) checked @endif>
                                                        </td>
                                                    </tr>
                                                @else
                                                    @if ($main_menu->menus)
                                                        @foreach ($main_menu->menus as $menu)
                                                            <tr>
                                                                <td width="50%">
                                                                    {{ $main_menu->title }} / {{ $menu->title }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <input tabindex="5" type="checkbox" class="icheck" id="view_{{ $main_menu->id }}_{{ $menu->id }}" name="view_{{ $main_menu->id }}_{{ $menu->id }}" value="1" @if (old('view_' . $main_menu->id . '_' . $menu->id) == 1) checked @endif>
                                                                </td>
                                                                <td class="text-center">
                                                                    <input tabindex="5" type="checkbox" class="icheck" id="add_{{ $main_menu->id }}_{{ $menu->id }}" name="add_{{ $main_menu->id }}_{{ $menu->id }}" value="1" @if (old('add_' . $main_menu->id . '_' . $menu->id) == 1) checked @endif>
                                                                </td>
                                                                <td class="text-center">
                                                                    <input tabindex="5" type="checkbox" class="icheck" id="edit_{{ $main_menu->id }}_{{ $menu->id }}" name="edit_{{ $main_menu->id }}_{{ $menu->id }}" value="1" @if (old('edit_' . $main_menu->id . '_' . $menu->id) == 1) checked @endif>
                                                                </td>
                                                                <td class="text-center">
                                                                    <input tabindex="5" type="checkbox" class="icheck" id="delete_{{ $main_menu->id }}_{{ $menu->id }}" name="delete_{{ $main_menu->id }}_{{ $menu->id }}" value="1" @if (old('delete_' . $main_menu->id . '_' . $menu->id) == 1) checked @endif>
                                                                </td>
                                                                <td class="text-center">
                                                                    <input tabindex="5" type="checkbox" class="icheck" id="detail_{{ $main_menu->id }}_{{ $menu->id }}" name="detail_{{ $main_menu->id }}_{{ $menu->id }}" value="1" @if (old('detail_' . $main_menu->id . '_' . $menu->id) == 1) checked @endif>
                                                                </td>
                                                                <td class="text-center">
                                                                    <input tabindex="5" type="checkbox" class="icheck" id="approval_{{ $main_menu->id }}_{{ $menu->id }}" name="approval_{{ $main_menu->id }}_{{ $menu->id }}" value="1" @if (old('approval_' . $main_menu->id . '_' . $menu->id) == 1) checked @endif>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                @endif                                                
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                @if ($main_menus)
                                    @foreach ($main_menus as $main_menu)
                                        @if ($main_menu->is_parent == 0)
                                            <input type="hidden" data-id="main_menu_{{ $main_menu->id }}" name="main_menu_{{ $main_menu->id }}" value="{{ $main_menu->id }}">
                                            <input type="hidden" data-id="menu_{{ $main_menu->id }}" name="menu_{{ $main_menu->id }}" value="0">
                                            <input type="hidden" data-id="view_{{ $main_menu->id }}" name="view_{{ $main_menu->id }}" value="{{ old('view_' . $main_menu->id, 0) }}">
                                            <input type="hidden" data-id="add_{{ $main_menu->id }}" name="add_{{ $main_menu->id }}" value="{{ old('add_' . $main_menu->id, 0) }}">
                                            <input type="hidden" data-id="edit_{{ $main_menu->id }}" name="edit_{{ $main_menu->id }}" value="{{ old('edit_' . $main_menu->id, 0) }}">
                                            <input type="hidden" data-id="delete_{{ $main_menu->id }}" name="delete_{{ $main_menu->id }}" value="{{ old('delete_' . $main_menu->id, 0) }}">
                                            <input type="hidden" data-id="detail_{{ $main_menu->id }}" name="detail_{{ $main_menu->id }}" value="{{ old('detail_' . $main_menu->id, 0) }}">
                                            <input type="hidden" data-id="approval_{{ $main_menu->id }}" name="approval_{{ $main_menu->id }}" value="{{ old('approval_' . $main_menu->id, 0) }}">
                                        @else
                                            @if ($main_menu->menus)
                                                @foreach ($main_menu->menus as $menu)
                                                    <input type="hidden" data-id="main_menu_{{ $main_menu->id }}_{{ $menu->id }}" name="main_menu_{{ $main_menu->id }}_{{ $menu->id }}" value="{{ $main_menu->id }}">
                                                    <input type="hidden" data-id="menu_{{ $main_menu->id }}_{{ $menu->id }}" name="menu_{{ $main_menu->id }}_{{ $menu->id }}" value="{{ $menu->id }}">
                                                    <input type="hidden" data-id="view_{{ $main_menu->id }}_{{ $menu->id }}" name="view_{{ $main_menu->id }}_{{ $menu->id }}" value="{{ old('view_' . $main_menu->id . '_' . $menu->id, 0) }}">
                                                    <input type="hidden" data-id="add_{{ $main_menu->id }}_{{ $menu->id }}" name="add_{{ $main_menu->id }}_{{ $menu->id }}" value="{{ old('add_' . $main_menu->id . '_' . $menu->id, 0) }}">
                                                    <input type="hidden" data-id="edit_{{ $main_menu->id }}_{{ $menu->id }}" name="edit_{{ $main_menu->id }}_{{ $menu->id }}" value="{{ old('edit_' . $main_menu->id . '_' . $menu->id, 0) }}">
                                                    <input type="hidden" data-id="delete_{{ $main_menu->id }}_{{ $menu->id }}" name="delete_{{ $main_menu->id }}_{{ $menu->id }}" value="{{ old('delete_' . $main_menu->id . '_' . $menu->id, 0) }}">
                                                    <input type="hidden" data-id="detail_{{ $main_menu->id }}_{{ $menu->id }}" name="detail_{{ $main_menu->id }}_{{ $menu->id }}" value="{{ old('detail_' . $main_menu->id . '_' . $menu->id, 0) }}">
                                                    <input type="hidden" data-id="approval_{{ $main_menu->id }}_{{ $menu->id }}" name="approval_{{ $main_menu->id }}_{{ $menu->id }}" value="{{ old('approval_' . $main_menu->id . '_' . $menu->id, 0) }}">
                                                @endforeach
                                            @endif
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