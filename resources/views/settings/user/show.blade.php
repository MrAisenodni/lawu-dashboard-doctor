@extends('layouts.main')

@section('title', $c_menu->title)

@section('styles')
    <!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ asset('/js/select2/select2-bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/select2/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/selectboxit/jquery.selectBoxIt.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/daterangepicker/daterangepicker-bs3.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/icheck/skins/minimal/_all.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/icheck/skins/square/_all.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/icheck/skins/flat/_all.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/icheck/skins/futurico/futurico.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/icheck/skins/polaris/polaris.css') }}">
@endsection

@section('scripts')
    <!-- Imported scripts on this page -->
    <script src="{{ asset('/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('/js/typeahead.min.js') }}"></script>
    <script src="{{ asset('/js/selectboxit/jquery.selectBoxIt.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('/js/moment.min.js') }}"></script>
    <script src="{{ asset('/js/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('/js/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('/js/neon-chat.js') }}"></script>
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
            <h2>Detail {{ $c_menu->title }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-primary" data-collapsed="0">
            
                <div class="panel-heading">
                    <div class="panel-title">
                        Detail {{ $c_menu->title }}
                    </div>
                    
                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>
                
                <div class="panel-body">
                    
                    <form role="form" class="form-horizontal form-groups-bordered">
                        @csrf
                        <div class="row form-group pt-0">
                            <div class="col-lg-12 fw-bold">
                                1. DATA PRIBADI
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="nik" class="control-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $detail->nik) }}" disabled>
                            </div>
                            <div class="col-lg-8 col-xs-12 mb-5">
                                <label for="full_name" class="control-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $detail->full_name) }}" disabled>
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="gender" class="control-label">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="gender" name="gender" value="{{ old('gender', $detail->gender->name) }}" disabled>
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="religion" class="control-label">Agama</label>
                                <input type="text" class="form-control" id="religion" name="religion" value="{{ old('religion', $detail->religion->name) }}" disabled>
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="birth_place" class="control-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{ old('birth_place', $detail->birth_place) }}" disabled>
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="birth_date" class="control-label">Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" id="birth_date" name="birth_date" value="{{ old('birth_date', date('m/d/Y', strtotime($detail->birth_date))) }}" disabled>
                                    <div class="input-group-addon">
                                        <a href="#"><i class="entypo-calendar"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12 fw-bold">
                                2. KONTAK PRIBADI
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="email" class="control-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $detail->email) }}" disabled>
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="phone_number" class="control-label">Nomor HP</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $detail->phone_number) }}" disabled>
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="home_number" class="control-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="home_number" name="home_number" value="{{ old('home_number', $detail->home_number) }}" disabled>
                            </div>
                            <div class="col-lg-8 col-xs-12 mb-5">
                                <label for="address_1" class="control-label">Alamat</label>
                                <textarea id="address_1" name="address_1" class="form-control autogrow" disabled>{{ old('address_1', $detail->address_1) }}</textarea>
                            </div>
                            <div class="col-lg-2 col-xs-12 mb-5">
                                <label for="address_2" class="control-label">RT</label>
                                <input type="text" class="form-control" id="address_2" name="address_2" value="{{ old('address_2', $detail->address_2) }}" disabled>
                            </div>
                            <div class="col-lg-2 col-xs-12 mb-5">
                                <label for="address_3" class="control-label">RW</label>
                                <input type="text" class="form-control" id="address_3" name="address_3" value="{{ old('address_3', $detail->address_3) }}" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12 fw-bold">
                                3. AKUN LOGIN
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="username" class="control-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $detail->login->username) }}" disabled>
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="password" class="control-label">Kata Sandi</label>
                                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" disabled>
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="role" class="control-label">Posisi / Peran</label>
                                <input type="text" class="form-control" id="role" name="role" value="{{ old('role', $detail->role->name) }}" disabled>
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="group_menu" class="control-label">Grup Menu</label>
                                <input type="text" class="form-control" id="group_menu" name="group_menu" value="{{ old('group_menu', $detail->group_menu->name) }}" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12 text-right">
                                <a href="{{ $c_menu->url }}" class="btn btn-warning">KEMBALI</a>
                            </div>
                        </div>
                    </form>
                    
                </div>
            
            </div>
        
        </div>
    </div>
@endsection