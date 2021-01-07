@extends('adminlte::page')


@section('content_header')
    <h1>Hibah Uang</h1>
@stop

@section('content')



    @livewire('pokmas-info')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <div class="text-sm table-responsive">
                @livewire('pokmas-table')

            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style type="text/css">
        .custom-select.form-control-border,
        .form-control.form-control-border {
            border-top: 0;
            border-left: 0;
            border-right: 0;
            border-radius: 0;
            box-shadow: inherit;


        }

        [x-cloak] {
            display: none;
        }

    </style>
@stop

@section('js')
    @stack('script')
@stop
