@section('title')
{{ 'QR code' }}
@endsection

@extends('layouts.base')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">{{$asset->model->manufacturer->name . ' ' . $asset->model->name}} (Tag: {{$asset->tag}})</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <img src="{{asset('images/' . 'QR-' . $asset->tag . '.png')}}" class="img-fluid" alt="QR code" style="max-width: 10%;">
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
