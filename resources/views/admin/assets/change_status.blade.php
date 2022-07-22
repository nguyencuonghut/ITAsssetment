@section('title')
{{ 'Cập nhật trạng thái tài sản' }}
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
                    <h1 class="m-0">Cập nhật trạng thái tài sản</h1>
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
                        <form class="form-horizontal" method="post" action="{{ route('admin.assets.updateStatus', $asset->id) }}" name="update_status" id="update_status" novalidate="novalidate">
                            @method('PATCH')
                            {{ csrf_field() }}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Trạng thái</label>
                                            <div class="controls">
                                                <select name="status" id="status" data-placeholder="Chọn trạng thái" class="form-control select2">
                                                    <option value="Đã cấp phát" {{"Đã cấp phát" == $asset->status ? 'selected' : ''}}>Đã cấp phát</option>
                                                    <option value="Đã thu hồi" {{"Đã thu hồi" == $asset->status ? 'selected' : ''}}>Đã thu hồi</option>
                                                    <option value="Sẵn sàng cấp phát" {{"Sẵn sàng cấp phát" == $asset->status ? 'selected' : ''}}>Sẵn sàng cấp phát</option>
                                                    <option value="Hỏng - Không sửa được" {{"Hỏng - Không sửa được" == $asset->status ? 'selected' : ''}}>Hỏng - Không sửa được</option>
                                                    <option value="Hỏng - Mang đi sửa" {{"Hỏng - Mang đi sửa" == $asset->status ? 'selected' : ''}}>Hỏng - Mang đi sửa</option>
                                                    <option value="Đã thất lạc" {{"Đã thất lạc" == $asset->status ? 'selected' : ''}}>Đã thất lạc</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Nhân viên</label>
                                            <div class="controls">
                                                <select name="employee_id" id="employee_id" data-placeholder="Chọn nhân viên" class="form-control select2">
                                                    @foreach ($employees as $item)
                                                    <option value="{{$item->id}}" {{$item->id == $asset->employee_id ? 'selected' : ''}}>{{$item->email}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Vị trí</label>
                                            <div class="controls">
                                                <select name="area_id" id="area_id" data-placeholder="Chọn vị trí" class="form-control select2">
                                                    @foreach ($areas as $item)
                                                    <option value="{{$item->id}}" {{$item->id == $asset->area_id ? 'selected' : ''}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="submit" value="Cập nhật" class="btn btn-success">
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
<!-- Moment -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2({
        theme: 'bootstrap4'
        });

        //Date picker
        $('#purchasing_date').datetimepicker({
            format: 'L'
        });
    })
</script>
@endpush
