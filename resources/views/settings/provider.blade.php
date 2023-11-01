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
    <script src="{{ asset('/js/form-select2.js') }}"></script>

    {{-- Automatic Show Picture Uploaded --}}
    <script type="text/javascript">
        // For Upload Picture
        function readURLLogo(input) 
        {
            if (input.files && input.files[0])
            {
                var reader = new FileReader()
    
                reader.onload = function (e) 
                {
                    $('#show_logo').attr('src', e.target.result)
                }
    
                reader.readAsDataURL(input.files[0])
            }
        }
        function readURLPicture(input) 
        {
            if (input.files && input.files[0])
            {
                var reader = new FileReader()
    
                reader.onload = function (e) 
                {
                    $('#show_picture').attr('src', e.target.result)
                }
    
                reader.readAsDataURL(input.files[0])
            }
        }
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
            <h2>{{ $c_menu->title }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-primary" data-collapsed="0">
            
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ $c_menu->title }}
                    </div>
                    
                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>
                
                <div class="panel-body">
                    
                    <form role="form" method="POST" action="{{ $c_menu->url }}" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                        @csrf
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

                        <div class="row form-group pt-0">
                            <input type="hidden" name="id" value="{{ $detail->id }}">

                            {{-- 1. PROFIL PERUSAHAAN --}}
                            <div class="col-lg-12 mb-5">
                                <h4 class="fw-bold">1. PROFIL PERUSAHAAN</h4>
                            </div>
                            <div class="col-lg-6 col-xs-12 mb-5">
                                <label class="form-label" for="provider_logo">Logo Perusahaan</label>
                                <span class="desc"></span>
                                <img id="show_logo" class="img-responsive" src="{{ asset('/storage/'.$detail->provider_logo) }}" alt="" style="max-height:50px;">
                                <input type="hidden" name="old_provider_logo" value="{{ $detail->provider_logo }}">
                                <input type="file" class="form-control @error('provider_logo') validate-has-error @enderror" id="image" name="provider_logo" value="{{ old('provider_logo', $detail->provider_logo) }}" onchange="readURLLogo(this)">
                                @error('provider_logo')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-xs-12 mb-5">
                                <label class="form-label" for="provider_picture">Label Perusahaan</label>
                                <span class="desc"></span>
                                <img id="show_picture" class="img-responsive" src="{{ asset('/storage/'.$detail->provider_picture) }}" alt="" style="max-height:50px;">
                                <input type="hidden" name="old_provider_picture" value="{{ $detail->provider_picture }}">
                                <input type="file" class="form-control @error('provider_picture') validate-has-error @enderror" id="image" name="provider_picture" value="{{ old('provider_picture', $detail->provider_picture) }}" onchange="readURLPicture(this)">
                                @error('provider_picture')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="provider_npwp" class="control-label">NPWP Perusahaan</label>
                                <input type="text" class="form-control @error('provider_npwp') validate-has-error @enderror" id="provider_npwp" name="provider_npwp" value="{{ old('provider_npwp', $detail->provider_npwp) }}">
                                @error('provider_npwp')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-8 col-xs-12 mb-5">
                                <label for="provider_name" class="control-label">Nama Perusahaan</label>
                                <input type="text" class="form-control @error('provider_name') validate-has-error @enderror" id="provider_name" name="provider_name" value="{{ old('provider_name', $detail->provider_name) }}">
                                @error('provider_name')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-xs-12 mb-5">
                                <label for="provider_birth_place" class="control-label">Tempat Didirikan Perusahaan</label>
                                <input type="text" class="form-control @error('provider_birth_place') validate-has-error @enderror" id="provider_birth_place" name="provider_birth_place" value="{{ old('provider_birth_place', $detail->provider_birth_place) }}">
                                @error('provider_birth_place')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-xs-12 mb-5">
                                <label for="provider_birth_date" class="control-label">Tanggal Didirikan Perusahaan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker @error('provider_birth_date') validate-has-error @enderror" id="provider_birth_date" name="provider_birth_date" value="{{ old('provider_birth_date', date('m/d/Y', strtotime($detail->provider_birth_date))) }}">
                                    <div class="input-group-addon">
                                        <a href="#"><i class="entypo-calendar"></i></a>
                                    </div>
                                </div>
                                @error('provider_birth_date')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="provider_email" class="control-label">Email Perusahaan</label>
                                <input type="email" class="form-control @error('provider_email') validate-has-error @enderror" id="provider_email" name="provider_email" value="{{ old('provider_email', $detail->provider_email) }}">
                                @error('provider_email')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="provider_phone_number" class="control-label">Nomor HP Perusahaan</label>
                                <input type="text" class="form-control @error('provider_phone_number') validate-has-error @enderror" id="provider_phone_number" name="provider_phone_number" value="{{ old('provider_phone_number', $detail->provider_phone_number) }}">
                                @error('provider_phone_number')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="provider_home_number" class="control-label">Nomor Telepon Perusahaan</label>
                                <input type="text" class="form-control @error('provider_home_number') validate-has-error @enderror" id="provider_home_number" name="provider_home_number" value="{{ old('provider_home_number', $detail->provider_home_number) }}">
                                @error('provider_home_number')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12 col-xs-12 mb-5">
                                <label for="provider_address_1" class="control-label">Alamat Perusahaan</label>
                                <textarea id="provider_address_1" name="provider_address_1" class="form-control autogrow @error('provider_address_1') validate-has-error @enderror">{{ old('provider_address_1', $detail->provider_address_1) }}</textarea>
                                @error('provider_address_1')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-2 col-xs-12 mb-5">
                                <label for="provider_address_2" class="control-label">RT Perusahaan</label>
                                <input type="text" class="form-control @error('provider_address_2') validate-has-error @enderror" id="provider_address_2" name="provider_address_2" value="{{ old('provider_address_2', $detail->provider_address_2) }}">
                                @error('provider_address_2')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-2 col-xs-12 mb-5">
                                <label for="provider_address_3" class="control-label">RW Perusahaan</label>
                                <input type="text" class="form-control @error('provider_address_3') validate-has-error @enderror" id="provider_address_3" name="provider_address_3" value="{{ old('provider_address_3', $detail->provider_address_3) }}">
                                @error('provider_address_3')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="provider_district" class="control-label">Kecamatan Perusahaan</label>
                                <select id="provider_district" name="provider_district" class="select-min @error('provider_district') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Kecamatan Perusahaan">
                                    <option></option>
                                    @if ($districts)
                                        @foreach ($districts as $item)
                                            <option value="{{ $item->id }}" @if(old('provider_district', $detail->provider_district_id) == $item->id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('provider_district')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="provider_ward" class="control-label">Kelurahan Perusahaan</label>
                                <input type="text" class="form-control @error('provider_ward') validate-has-error @enderror" id="provider_ward" name="provider_ward" value="{{ old('provider_ward', $detail->provider_ward) }}">
                                @error('provider_ward')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- 2. PROFIL PEMILIK --}}
                        <div class="row form-group">
                            <div class="col-lg-12 mb-5">
                                <h4 class="fw-bold">2. PROFIL PEMILIK</h4>
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="owner_npwp" class="control-label">NPWP Pemilik</label>
                                <input type="text" class="form-control @error('owner_npwp') validate-has-error @enderror" id="owner_npwp" name="owner_npwp" value="{{ old('owner_npwp', $detail->owner_npwp) }}">
                                @error('owner_npwp')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-8 col-xs-12 mb-5">
                                <label for="owner_name" class="control-label">Nama Pemilik</label>
                                <input type="text" class="form-control @error('owner_name') validate-has-error @enderror" id="owner_name" name="owner_name" value="{{ old('owner_name', $detail->owner_name) }}">
                                @error('owner_name')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-xs-12 mb-5">
                                <label for="owner_birth_place" class="control-label">Tempat Didirikan Pemilik</label>
                                <input type="text" class="form-control @error('owner_birth_place') validate-has-error @enderror" id="owner_birth_place" name="owner_birth_place" value="{{ old('owner_birth_place', $detail->owner_birth_place) }}">
                                @error('owner_birth_place')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-xs-12 mb-5">
                                <label for="owner_birth_date" class="control-label">Tanggal Didirikan Pemilik</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker @error('owner_birth_date') validate-has-error @enderror" id="owner_birth_date" name="owner_birth_date" value="{{ old('owner_birth_date', date('m/d/Y', strtotime($detail->owner_birth_date))) }}">
                                    <div class="input-group-addon">
                                        <a href="#"><i class="entypo-calendar"></i></a>
                                    </div>
                                </div>
                                @error('owner_birth_date')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="owner_email" class="control-label">Email Pemilik</label>
                                <input type="email" class="form-control @error('owner_email') validate-has-error @enderror" id="owner_email" name="owner_email" value="{{ old('owner_email', $detail->owner_email) }}">
                                @error('owner_email')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="owner_phone_number" class="control-label">Nomor HP Pemilik</label>
                                <input type="text" class="form-control @error('owner_phone_number') validate-has-error @enderror" id="owner_phone_number" name="owner_phone_number" value="{{ old('owner_phone_number', $detail->owner_phone_number) }}">
                                @error('owner_phone_number')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="owner_home_number" class="control-label">Nomor Telepon Pemilik</label>
                                <input type="text" class="form-control @error('owner_home_number') validate-has-error @enderror" id="owner_home_number" name="owner_home_number" value="{{ old('owner_home_number', $detail->owner_home_number) }}">
                                @error('owner_home_number')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12 col-xs-12 mb-5">
                                <label for="owner_address_1" class="control-label">Alamat Pemilik</label>
                                <textarea id="owner_address_1" name="owner_address_1" class="form-control autogrow @error('owner_address_1') validate-has-error @enderror">{{ old('owner_address_1', $detail->owner_address_1) }}</textarea>
                                @error('owner_address_1')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-2 col-xs-12 mb-5">
                                <label for="owner_address_2" class="control-label">RT Pemilik</label>
                                <input type="text" class="form-control @error('owner_address_2') validate-has-error @enderror" id="owner_address_2" name="owner_address_2" value="{{ old('owner_address_2', $detail->owner_address_2) }}">
                                @error('owner_address_2')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-2 col-xs-12 mb-5">
                                <label for="owner_address_3" class="control-label">RW Pemilik</label>
                                <input type="text" class="form-control @error('owner_address_3') validate-has-error @enderror" id="owner_address_3" name="owner_address_3" value="{{ old('owner_address_3', $detail->owner_address_3) }}">
                                @error('owner_address_3')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="owner_district" class="control-label">Kecamatan Pemilik</label>
                                <select id="owner_district" name="owner_district" class="select-min @error('owner_district') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Kecamatan Pemilik">
                                    <option></option>
                                    @if ($districts)
                                        @foreach ($districts as $item)
                                            <option value="{{ $item->id }}" @if(old('owner_district', $detail->owner_district_id) == $item->id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('owner_district')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-xs-12 mb-5">
                                <label for="owner_ward" class="control-label">Kelurahan Pemilik</label>
                                <input type="text" class="form-control @error('owner_ward') validate-has-error @enderror" id="owner_ward" name="owner_ward" value="{{ old('owner_ward', $detail->owner_ward) }}">
                                @error('owner_ward')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12 text-right">
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            
            </div>
        
        </div>
    </div>
@endsection