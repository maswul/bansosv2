@extends('adminlte::page')

@section('title', 'Master Data - Pegawai')

@section('content_header')
    <h1>DATA</h1>Pegawai & Anggaran
@stop

@section('content')
    @if (Auth::user()->role < 3)
    <!-- Data Anggaran -->
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-fw fa-wallet"></i> Data Anggaran</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @livewire('anggaran-table')
        </div>
    </div>
    @endif
    <!-- Data Pegawai -->
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-fw fa-user-friends"></i> Data Pegawai</h3>
        </div>
        <div class="card-body">
            <div class="text-sm table-responsive">
                @livewire('pegawai-table')

            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
@stop
