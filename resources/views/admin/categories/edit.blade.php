@section('title')
{{ 'Sửa danh mục' }}
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
                    <h1 class="m-0">Sửa danh mục</h1>
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
                        <form class="form-horizontal" method="post" action="{{ route('admin.categories.update', $category->id) }}" name="edit_category" id="edit_category" novalidate="novalidate">
                            @method('PATCH')
                            {{ csrf_field() }}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Tên</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="name" id="name" required="" value="{{ $category->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Kiểu</label>
                                            <div class="controls">
                                                <select name="type" id="type" data-placeholder="Chọn kiểu" class="form-control select2">
                                                    <option value="Tài Sản" {{"Tài Sản" == $category->type ? 'selected' : ''}}>Tài Sản</option>
                                                    <option value="Phụ Kiện" {{"Tài Sản" == $category->type ? 'selected' : ''}}>Phụ Kiện</option>
                                                    <option value="Linh Kiện" {{"Linh Kiện" == $category->type ? 'selected' : ''}}>Linh Kiện</option>
                                                    <option value="Bản Quyền" {{"Bản Quyền" == $category->type ? 'selected' : ''}}>Bản Quyền</option>
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
