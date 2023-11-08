@extends('layouts.main')

@section('title', $c_menu->title)

@section('styles')
    <!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ asset('/js/select2/select2-bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/select2/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/daterangepicker/daterangepicker-bs3.css') }}">
@endsection

@section('scripts')
    <!-- Imported scripts on this page -->
    <script src="{{ asset('/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
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
            <h2>{{ $c_menu->title }}</h2>
        </div>
    </div>

    <div class="profile-env">
    
        <header class="row">
            
            <div class="col-sm-2">
                
                <a href="#" class="profile-picture">
                    <img src="{{ asset('/images/profile-picture.png') }}" class="img-responsive img-circle" />
                </a>
                
            </div>
            
            <div class="col-sm-7">
                
                <ul class="profile-info-sections">
                    <li>
                        <div class="profile-name">
                            <strong>
                                <a href="#">{{ $detail->full_name }}</a>
                                <a href="#" class="user-status is-online tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="Online"></a>
                                <!-- User statuses available classes "is-online", "is-offline", "is-idle", "is-busy" -->						</strong>
                            <span><a href="#">{{ $detail->role->name }}</a></span>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        
        <section class="profile-info-tabs">
            <div class="row">
                <div class="col-sm-offset-2 col-sm-4">
                    <ul class="user-details">
                        <li>
                            <a href="#">
                                <i class="entypo-vcard"></i>
                                @if ($detail->nik)
                                    {{ $detail->nik }}
                                @else 
                                    -
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-chart-line"></i>
                                @if ($detail->gender)
                                    {{ $detail->gender->name }}
                                @else 
                                    -
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-calendar"></i>
                                @if ($detail->birth_place)
                                    {{ $detail->birth_place }}
                                @else 
                                    -
                                @endif, @if ($detail->birth_date)
                                    {{ date('d M Y', strtotime($detail->birth_date)) }}
                                @else 
                                    -
                                @endif
                            </a>
                        </li>
                    </ul>
                    
                    <!-- tabs for the profile links -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile-info">Profile</a></li>
                        <li><a href="{{ $c_menu->url }}/create">Ubah Profil</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <ul class="user-details">
                        <li>
                            <a href="#">
                                <i class="entypo-location"></i>
                                {{ $detail->address_1 }} RT: 
                                @if ($detail->address_2)
                                    {{ $detail->address_2 }}
                                @else 
                                    -
                                @endif RW: 
                                @if ($detail->address_3)
                                    {{ $detail->address_3 }}
                                @else 
                                    -
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-mail"></i>
                                @if ($detail->email)
                                    {{ $detail->email }}
                                @else 
                                    -
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-phone"></i>
                                @if ($detail->phone_number)
                                    {{ $detail->phone_number }}
                                @else 
                                    -
                                @endif /
                                @if ($detail->home_number)
                                    {{ $detail->home_number }}
                                @else 
                                    -
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <ul class="user-details">
                        <li>
                            <a href="#">
                                <i class="entypo-heart"></i>
                                @if ($detail->religion)
                                    {{ $detail->religion->name }}
                                @else 
                                    -
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="entypo-user"></i>
                                {{ $detail->login->username }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <form role="form" method="POST" action="{{ $c_menu->url }}" class="form-horizontal form-groups-bordered">
                    @csrf
                    <div class="row pt-0">
                        <div class="col-lg-12 fw-bold">
                            1. DATA PRIBADI
                        </div>
                        <div class="col-lg-12">
                            <div class="row form-group">
                                <div class="col-lg-4 col-xs-12 mb-5">
                                    <label for="nik" class="control-label">NIK</label>
                                    <input type="text" class="form-control @error('nik') validate-has-error @enderror" id="nik" name="nik" value="{{ old('nik', $detail->nik) }}">
                                    @error('nik')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-8 col-xs-12 mb-5">
                                    <label for="full_name" class="control-label">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('full_name') validate-has-error @enderror" id="full_name" name="full_name" value="{{ old('full_name', $detail->full_name) }}">
                                    @error('full_name')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-3 col-xs-12 mb-5">
                                    <label for="gender" class="control-label">Jenis Kelamin</label>
                                    <select id="gender" name="gender" class="select2 @error('gender') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Jenis Kelamin">
                                        <option></option>
                                        @if ($genders)
                                            @foreach ($genders as $item)
                                                <option value="{{ $item->id }}" @if(old('gender', $detail->gender_id) == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('gender')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-xs-12 mb-5">
                                    <label for="religion" class="control-label">Agama</label>
                                    <select id="religion" name="religion" class="select2 @error('religion') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Agama">
                                        <option></option>
                                        @if ($religions)
                                            @foreach ($religions as $item)
                                                <option value="{{ $item->id }}" @if(old('religion', $detail->religion_id) == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('religion')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-xs-12 mb-5">
                                    <label for="birth_place" class="control-label">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('birth_place') validate-has-error @enderror" id="birth_place" name="birth_place" value="{{ old('birth_place', $detail->birth_place) }}">
                                    @error('birth_place')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-xs-12 mb-5">
                                    <label for="birth_date" class="control-label">Tanggal Lahir</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker @error('birth_date') validate-has-error @enderror" id="birth_date" name="birth_date" value="{{ old('birth_date', date('m/d/Y', strtotime($detail->birth_date))) }}">
                                        <div class="input-group-addon">
                                            <a href="#"><i class="entypo-calendar"></i></a>
                                        </div>
                                    </div>
                                    @error('birth_date')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 fw-bold">
                            2. KONTAK PRIBADI
                        </div>
                        <div class="col-lg-12">
                            <div class="row form-group">
                                <div class="col-lg-4 col-xs-12 mb-5">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="text" class="form-control @error('email') validate-has-error @enderror" id="email" name="email" value="{{ old('email', $detail->email) }}">
                                    @error('email')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-xs-12 mb-5">
                                    <label for="phone_number" class="control-label">Nomor HP</label>
                                    <input type="text" class="form-control @error('phone_number') validate-has-error @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $detail->phone_number) }}">
                                    @error('phone_number')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-xs-12 mb-5">
                                    <label for="home_number" class="control-label">Nomor Telepon</label>
                                    <input type="text" class="form-control @error('home_number') validate-has-error @enderror" id="home_number" name="home_number" value="{{ old('home_number', $detail->home_number) }}">
                                    @error('home_number')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-8 col-xs-12 mb-5">
                                    <label for="address_1" class="control-label">Alamat</label>
                                    <textarea id="address_1" name="address_1" class="form-control autogrow @error('address_1') validate-has-error @enderror">{{ old('address_1', $detail->address_1) }}</textarea>
                                    @error('address_1')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-2 col-xs-12 mb-5">
                                    <label for="address_2" class="control-label">RT</label>
                                    <input type="text" class="form-control @error('address_2') validate-has-error @enderror" id="address_2" name="address_2" value="{{ old('address_2', $detail->address_2) }}">
                                    @error('address_2')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-2 col-xs-12 mb-5">
                                    <label for="address_3" class="control-label">RW</label>
                                    <input type="text" class="form-control @error('address_3') validate-has-error @enderror" id="address_3" name="address_3" value="{{ old('address_3', $detail->address_3) }}">
                                    @error('address_3')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 fw-bold">
                            3. AKUN LOGIN
                        </div>
                        <div class="col-lg-12">
                            <div class="row form-group">
                                <div class="col-lg-3 col-xs-12 mb-5">
                                    <label for="username" class="control-label">Username</label>
                                    <input type="text" class="form-control @error('username') validate-has-error @enderror" id="username" name="username" value="{{ old('username', $detail->login->username) }}">
                                    @error('username')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-xs-12 mb-5">
                                    <label for="password" class="control-label">Kata Sandi</label>
                                    <input type="password" class="form-control @error('password') validate-has-error @enderror" id="password" name="password" value="{{ old('password') }}">
                                    @error('password')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-xs-12 mb-5">
                                    <label for="role" class="control-label">Posisi / Peran</label>
                                    <select id="role" name="role" class="select2 @error('role') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Peran">
                                        <option></option>
                                        @if ($roles)
                                            @foreach ($roles as $item)
                                                <option value="{{ $item->id }}" @if(old('role', $detail->role_id) == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('role')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-xs-12 mb-5">
                                    <label for="group_menu" class="control-label">Grup Menu</label>
                                    <select id="group_menu" name="group_menu" class="select2 @error('group_menu') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Grup Menu">
                                        <option></option>
                                        @if ($group_menus)
                                            @foreach ($group_menus as $item)
                                                <option value="{{ $item->id }}" @if(old('group_menu', $detail->group_menu_id) == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('group_menu')
                                        <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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
@endsection