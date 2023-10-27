@extends('layouts.main')

@section('title', $c_menu->title)

@section('styles')
    <!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ asset('/js/select2/select2-bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('/js/select2/select2.css') }}">
@endsection

@section('scripts')
    <!-- Imported scripts on this page -->
    <script src="{{ asset('/js/select2/select2.min.js') }}"></script>
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
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="role" class="control-label">Peran</label>
                                <select id="role" name="role" class="select2 @error('role') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Peran">
                                    <option></option>
                                    @if ($roles)
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}" @if(old('role') == $item->id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('role')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="title" class="control-label">Judul</label>
                                <input type="text" class="form-control @error('title') validate-has-error @enderror" id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="module_name" class="control-label">Nama Modul</label>
                                <input type="text" class="form-control @error('module_name') validate-has-error @enderror" id="module_name" name="module_name" value="{{ old('module_name') }}">
                                @error('module_name')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-xs-12 mb-5">
                                <label for="table" class="control-label">Nama Tabel</label>
                                <input type="text" class="form-control @error('table') validate-has-error @enderror" id="table" name="table" value="{{ old('table') }}">
                                @error('table')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror
                                {{-- <label for="table" class="control-label">Nama Tabel</label>
                                <select id="table" name="table" class="select2 @error('table') validate-has-error @enderror" data-allow-clear="true" data-placeholder="Pilih Nama Tabel">
                                    <option></option>
                                    @if ($tables)
                                        @foreach ($tables as $item)
                                            <option value="{{ explode('create_', $item->migration)[1] }}" @if(old('table') == explode('create_', $item->migration)[1]) selected @endif>{{ explode('create_', $item->migration)[1] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('table')
                                    <span id="name-error" class="validate-has-error">{{ $message }}</span>
                                @enderror --}}
                            </div>
                            <div class="col-lg-12 col-xs-12 mb-5">
                                <label for="condition" class="control-label">Kondisi</label>
                                <textarea id="condition" name="condition" class="form-control autogrow @error('condition') validate-has-error @enderror">{{ old('condition') }}</textarea>
                                @error('condition')
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