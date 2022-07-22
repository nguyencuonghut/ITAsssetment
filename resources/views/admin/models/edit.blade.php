@section('title')
{{ 'Sửa model thiết bị' }}
@endsection

@push('styles')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@extends('layouts.base')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sửa model thiết bị</h1>
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
                    <div class="card">
                        <form class="form-horizontal" method="post" action="{{ route('admin.models.update', $model->id) }}" name="edit_model" id="edit_model" novalidate="novalidate">
                            @method('PATCH')
                            {{ csrf_field() }}
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Tên</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="name" id="name" required="" value="{{$model->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="control-label">Số model</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="model_no" id="model_no" value="{{$model->model_no}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Hãng sản xuất</label>
                                            <div class="controls">
                                                <select name="manufacturer_id" id="manufacturer_id" data-placeholder="Chọn hãng" class="form-control select2">
                                                    @foreach ($manufacturers as $item)
                                                        <option value="{{$item->id}}" {{$item->id == $model->manufacturer_id ? 'selected' : ''}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Chọn danh mục thiết bị</label>
                                            <div class="controls">
                                                <select name="category_id" id="category_id" data-placeholder="Chọn danh mục" class="form-control select2">
                                                    @foreach ($categories as $item)
                                                        <option value="{{$item->id}}" {{$item->id == $model->category_id ? 'selected' : ''}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="submit" value="Sửa" class="btn btn-success">
                                    </div>
                                </div>
                            <div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2({
        theme: 'bootstrap4'
        })
    })
</script>
@endpush
