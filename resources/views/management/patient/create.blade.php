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
    <script src="{{ asset('/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('/js/moment.min.js') }}"></script>
    <script src="{{ asset('/js/daterangepicker/daterangepicker.js') }}"></script>
@endsection

@section('content')
    <ol class="breadcrumb bc-3" >
        <li>
        <a href="/"><i class="fa-home"></i>Dashboard</a>
        </li>
        <li>
            <a href="#">Manajemen</a>
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

                        {{-- 1. DATA PRIBADI PASIEN --}}
                        <div class="row form-group pt-0">
                            <div class="col-lg-12 fw-bold">
                                1. DATA PRIBADI PASIEN
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-2 col-xs-12 mb-5">
                                        <label for="nik" class="control-label">NIK</label>
                                        <input type="text" class="form-control @error('nik') validate-has-error @enderror" id="nik" name="nik" value="{{ old('nik') }}">
                                        @error('nik')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-xs-12 mb-5">
                                        <label for="full_name" class="control-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('full_name') validate-has-error @enderror" id="full_name" name="full_name" value="{{ old('full_name') }}">
                                        @error('full_name')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-xs-12 mb-5">
                                        <label for="inisial_name" class="control-label">Nama Inisial</label>
                                        <input type="text" class="form-control @error('inisial_name') validate-has-error @enderror" id="inisial_name" name="inisial_name" value="{{ old('inisial_name') }}">
                                        @error('inisial_name')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-xs-12 mb-5">
                                        <label for="alias_name" class="control-label">Nama Alias</label>
                                        <input type="text" class="form-control @error('alias_name') validate-has-error @enderror" id="alias_name" name="alias_name" value="{{ old('alias_name') }}">
                                        @error('alias_name')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-xs-12 mb-5">
                                        <label for="gender" class="control-label">Jenis Kelamin</label>
                                        <select id="gender" name="gender" class="select2 @error('gender') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Jenis Kelamin">
                                            <option></option>
                                            @if ($genders)
                                                @foreach ($genders as $item)
                                                    <option value="{{ $item->id }}" @if(old('gender') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('gender')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-xs-12 mb-5">
                                        <label for="blood_type" class="control-label">Golongan Darah</label>
                                        <select id="blood_type" name="blood_type" class="select2 @error('blood_type') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Golongan Darah">
                                            <option></option>
                                            @if ($blood_types)
                                                @foreach ($blood_types as $item)
                                                    <option value="{{ $item->id }}" @if(old('blood_type') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('blood_type')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-xs-12 mb-5">
                                        <label for="religion" class="control-label">Agama</label>
                                        <select id="religion" name="religion" class="select2 @error('religion') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Agama">
                                            <option></option>
                                            @if ($religions)
                                                @foreach ($religions as $item)
                                                    <option value="{{ $item->id }}" @if(old('religion') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('religion')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 col-xs-12 mb-5">
                                        <label for="birth_place" class="control-label">Tempat Lahir</label>
                                        <input type="text" class="form-control @error('birth_place') validate-has-error @enderror" id="birth_place" name="birth_place" value="{{ old('birth_place') }}">
                                        @error('birth_place')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 col-xs-12 mb-5">
                                        <label for="birth_date" class="control-label">Tanggal Lahir</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker @error('birth_date') validate-has-error @enderror" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
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

                        {{-- 2. KONTAK PRIBADI --}}
                        <div class="row form-group">
                            <div class="col-lg-12 fw-bold">
                                2. KONTAK PRIBADI
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4 col-xs-12 mb-5">
                                        <label for="email" class="control-label">Email</label>
                                        <input type="text" class="form-control @error('email') validate-has-error @enderror" id="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-xs-12 mb-5">
                                        <label for="phone_number" class="control-label">Nomor HP</label>
                                        <input type="text" class="form-control @error('phone_number') validate-has-error @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-xs-12 mb-5">
                                        <label for="home_number" class="control-label">Nomor Telepon</label>
                                        <input type="text" class="form-control @error('home_number') validate-has-error @enderror" id="home_number" name="home_number" value="{{ old('home_number') }}">
                                        @error('home_number')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-xs-12 mb-5">
                                        <label for="address_1" class="control-label">Alamat</label>
                                        <textarea id="address_1" name="address_1" class="form-control autogrow @error('address_1') validate-has-error @enderror">{{ old('address_1') }}</textarea>
                                        @error('address_1')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-xs-12 mb-5">
                                        <label for="district" class="control-label">Kecamatan</label>
                                        <select id="district" name="district" class="select2 @error('district') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Kecamatan">
                                            <option></option>
                                            @if ($districts)
                                                @foreach ($districts as $item)
                                                    <option value="{{ $item->id }}" @if(old('district') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('district')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-xs-12 mb-5">
                                        <label for="ward" class="control-label">Kelurahan</label>
                                        <input type="text" class="form-control @error('ward') validate-has-error @enderror" id="ward" name="ward" value="{{ old('ward') }}">
                                        @error('ward')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-xs-12 mb-5">
                                        <label for="post_code" class="control-label">Kode Pos</label>
                                        <input type="text" class="form-control @error('post_code') validate-has-error @enderror" id="post_code" name="post_code" value="{{ old('post_code') }}">
                                        @error('post_code')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 3. PENDAFTARAN PASIEN --}}
                        <div class="row form-group">
                            <div class="col-lg-12 fw-bold">
                                3. PENDAFTARAN PASIEN
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3 col-xs-12 mb-5">
                                        <label for="rm_no" class="control-label">Nomor RM <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('rm_no') validate-has-error @enderror" id="rm_no" name="rm_no" value="{{ old('rm_no') }}">
                                        @error('rm_no')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 col-xs-12 mb-5">
                                        <label for="registration_no" class="control-label">Nomor Registrasi <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('registration_no') validate-has-error @enderror" id="registration_no" name="registration_no" value="{{ old('registration_no') }}">
                                        @error('registration_no')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 col-xs-12 mb-5">
                                        <label for="registration_date" class="control-label">Tanggal Registrasi <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker @error('registration_date') validate-has-error @enderror" id="registration_date" name="registration_date" value="{{ old('registration_date') }}">
                                            <div class="input-group-addon">
                                                <a href="#"><i class="entypo-calendar"></i></a>
                                            </div>
                                        </div>
                                        @error('registration_date')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 col-xs-12 mb-5">
                                        <label for="doctor_reference" class="control-label">Referensi Dokter</label>
                                        <input type="text" class="form-control @error('doctor_reference') validate-has-error @enderror" id="doctor_reference" name="doctor_reference" value="{{ old('doctor_reference') }}">
                                        @error('doctor_reference')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-xs-12 mb-5">
                                        <label for="action" class="control-label">Tindakan <span class="text-danger">*</span></label>
                                        <select id="action" name="action" class="select2 @error('action') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Tindakan">
                                            <option></option>
                                            @if ($actions)
                                                @foreach ($actions as $item)
                                                    <option value="{{ $item->id }}" @if(old('action') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('action')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-xs-12 mb-5">
                                        <label for="assurance" class="control-label">Jaminan <span class="text-danger">*</span></label>
                                        <select id="assurance" name="assurance" class="select2 @error('assurance') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Jaminan">
                                            <option></option>
                                            @if ($assurances)
                                                @foreach ($assurances as $item)
                                                    <option value="{{ $item->id }}" @if(old('assurance') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('assurance')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-xs-12 mb-5">
                                        <label for="clinic" class="control-label">Klinik</label>
                                        <select id="clinic" name="clinic" class="select2 @error('clinic') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Klinik">
                                            <option></option>
                                            @if ($clinics)
                                                @foreach ($clinics as $item)
                                                    <option value="{{ $item->id }}" @if(old('clinic') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('clinic')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-xs-12 mb-5">
                                        <label for="doctor" class="control-label">Dokter</label>
                                        <select id="doctor" name="doctor" class="select2 @error('doctor') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Dokter">
                                            <option></option>
                                            @if ($doctors)
                                                @foreach ($doctors as $item)
                                                    <option value="{{ $item->id }}" @if(old('doctor') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('doctor')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-xs-12 mb-5">
                                        <label for="hospital" class="control-label">Rumah Sakit <span class="text-danger">*</span></label>
                                        <select id="hospital" name="hospital" class="select2 @error('hospital') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Rumah Sakit">
                                            <option></option>
                                            @if ($hospitals)
                                                @foreach ($hospitals as $item)
                                                    <option value="{{ $item->id }}" @if(old('hospital') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('hospital')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-xs-12 mb-5">
                                        <label for="payment_method" class="control-label">Metode Pembayaran</label>
                                        <select id="payment_method" name="payment_method" class="select2 @error('payment_method') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Metode Pembayaran">
                                            <option></option>
                                            @if ($payment_methods)
                                                @foreach ($payment_methods as $item)
                                                    <option value="{{ $item->id }}" @if(old('payment_method') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('payment_method')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-xs-12 mb-5">
                                        <label for="unit" class="control-label">Unit</label>
                                        <select id="unit" name="unit" class="select2 @error('unit') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Unit">
                                            <option></option>
                                            @if ($units)
                                                @foreach ($units as $item)
                                                    <option value="{{ $item->id }}" @if(old('unit') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('unit')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-xs-12 mb-5">
                                        <label for="visit_method" class="control-label">Cara Kunjung <span class="text-danger">*</span></label>
                                        <select id="visit_method" name="visit_method" class="select2 @error('visit_method') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Cara Kunjung">
                                            <option></option>
                                            @if ($visit_methods)
                                                @foreach ($visit_methods as $item)
                                                    <option value="{{ $item->id }}" @if(old('visit_method') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('visit_method')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-xs-12 mb-5">
                                        <label for="visit_time" class="control-label">Waktu Kunjung</label>
                                        <select id="visit_time" name="visit_time" class="select2 @error('visit_time') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Waktu Kunjung">
                                            <option></option>
                                            @if ($visit_times)
                                                @foreach ($visit_times as $item)
                                                    <option value="{{ $item->id }}" @if(old('visit_time') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('visit_time')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 4. INFORMASI TAMBAHAN PASIEN --}}
                        <div class="row form-group">
                            <div class="col-lg-12 fw-bold">
                                4. INFORMASI TAMBAHAN PASIEN
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 col-xs-12 mb-5">
                                        <label for="allergy" class="control-label">Alergi</label>
                                        <input type="text" class="form-control @error('allergy') validate-has-error @enderror" id="allergy" name="allergy" value="{{ old('allergy') }}">
                                        @error('allergy')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 col-xs-12 mb-5">
                                        <label for="education" class="control-label">Edukasi</label>
                                        <select id="education" name="education" class="select2 @error('education') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Edukasi">
                                            <option></option>
                                            @if ($educations)
                                                @foreach ($educations as $item)
                                                    <option value="{{ $item->id }}" @if(old('education') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('education')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 col-xs-12 mb-5">
                                        <label for="marital_status" class="control-label">Status Kawin</label>
                                        <select id="marital_status" name="marital_status" class="select2 @error('marital_status') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Status Kawin">
                                            <option></option>
                                            @if ($marital_statuss)
                                                @foreach ($marital_statuss as $item)
                                                    <option value="{{ $item->id }}" @if(old('marital_status') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('marital_status')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-xs-12 mb-5">
                                        <label for="citizen" class="control-label">Kewarganegaraan</label>
                                        <select id="citizen" name="citizen" class="select2 @error('citizen') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Kewarganegaraan">
                                            <option></option>
                                            @if ($citizens)
                                                @foreach ($citizens as $item)
                                                    <option value="{{ $item->id }}" @if(old('citizen') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('citizen')
                                            <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-xs-12 mb-5">
                                        <label for="occupation" class="control-label">Pekerjaan</label>
                                        <select id="occupation" name="occupation" class="select2 @error('occupation') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Kewarganegaraan">
                                            <option></option>
                                            @if ($occupations)
                                                @foreach ($occupations as $item)
                                                    <option value="{{ $item->id }}" @if(old('occupation') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('occupation')
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
    </div>
@endsection