@extends('layouts.main')

@section('title', $c_menu->title)

@section('styles')
    <!-- Imported styles on this page -->
@endsection

@section('scripts')
    <!-- Imported scripts on this page -->
	<script src="{{ asset('/js/bootstrap-colorpicker.min.js') }}"></script>
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
    </div>
@endsection