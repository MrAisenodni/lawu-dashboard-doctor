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
            <a href="#">Master</a>
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
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="code" class="control-label">Kode</label>
                                <input type="text" class="form-control @error('code') validate-has-error @enderror" id="code" name="code" value="{{ old('code') }}">
                                @error('code')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="name" class="control-label">{{ $c_menu->title }}</label>
                                <input type="text" class="form-control @error('name') validate-has-error @enderror" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="color" class="control-label">Warna</label>
                                <div class="input-group @error('color') validate-has-error @enderror">
                                    <input id="color" name="color" type="text" class="form-control colorpicker" data-format="hex" value="{{ old('color', '#000') }}" />
                                    <div class="input-group-addon">
                                        <i class="color-preview"></i>
                                    </div>
                                </div>
                                @error('color')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="background" class="control-label">Warna Latar</label>
                                <div class="input-group @error('background') validate-has-error @enderror">
                                    <input id="background" name="background" type="text" class="form-control colorpicker" data-format="hex" value="{{ old('background', '#fff') }}" />
                                    <div class="input-group-addon">
                                        <i class="color-preview"></i>
                                    </div>
                                </div>
                                @error('background')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
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