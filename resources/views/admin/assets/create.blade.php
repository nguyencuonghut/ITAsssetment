@section('title')
{{ 'Tạo tài sản' }}
@endsection

@push('styles')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush

@extends('layouts.base')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tạo tài sản</h1>
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
                        <form class="form-horizontal" method="post" action="{{ url('admin/assets') }}" name="add_asset" id="add_asset" novalidate="novalidate">{{ csrf_field() }}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Trạng thái</label>
                                            <div class="controls">
                                                <select name="status" id="status" data-placeholder="Chọn trạng thái" class="form-control select2">
                                                    <option selected="selected" disabled>-- Chọn trạng thái --</option>
                                                    <option value="Đã cấp phát">Đã cấp phát</option>
                                                    <option value="Đã thu hồi">Đã thu hồi</option>
                                                    <option value="Sẵn sàng cấp phát">Sẵn sàng cấp phát</option>
                                                    <option value="Hỏng - Không sửa được">Hỏng - Không sửa được</option>
                                                    <option value="Hỏng - Mang đi sửa">Hỏng - Mang đi sửa</option>
                                                    <option value="Đã thất lạc">Đã thất lạc</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Model thiết bị</label>
                                            <div class="controls">
                                                <select name="model_id" id="model_id" data-placeholder="Chọn model" class="form-control select2">
                                                    <option selected="selected" disabled>-- Chọn model --</option>
                                                    @foreach ($models as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Vị trí</label>
                                            <div class="controls">
                                                <select name="area_id" id="area_id" data-placeholder="Chọn vị trí" class="form-control select2">
                                                    <option selected="selected" disabled>-- Chọn vị trí --</option>
                                                    @foreach ($areas as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="control-group">
                                            <label class="control-label">Số tháng bảo hành</label>
                                            <div class="controls">
                                                <input type="number" class="form-control" name="warranty" id="warranty" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <div class="control-group">
                                            <label class="control-label">Serial</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="serial" id="serial" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="control-group">
                                            <label class="control-label">Giá trị (VNĐ)</label>
                                            <div class="controls">
                                                <input type="number" class="form-control" name="purchase_cost" id="purchase_cost" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="control-label">Ngày mua</label>
                                              <div class="input-group date" id="purchasing_date" data-target-input="nearest">
                                                  <input type="text" id="purchasing_date" name="purchasing_date" class="form-control datetimepicker-input" data-target="#purchasing_date"/>
                                                  <div class="input-group-append" data-target="#purchasing_date" data-toggle="datetimepicker">
                                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                  </div>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="control-group">
                                            <label class="control-label">Ghi chú</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="note" id="note" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Nhân viên</label>
                                            <div class="controls">
                                                <select name="employee_id" id="employee_id" data-placeholder="Chọn nhân viên" class="form-control select2">
                                                    <option selected="selected" disabled>-- Chọn nhân viên --</option>
                                                    @foreach ($employees as $item)
                                                    <option value="{{$item->id}}">{{$item->email}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Nhà cung cấp</label>
                                            <div class="controls">
                                                <select name="supplier_id" id="supplier_id" data-placeholder="Chọn NCC" class="form-control select2">
                                                    <option selected="selected" disabled>-- Chọn NCC --</option>
                                                    @foreach ($suppliers as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="submit" value="Thêm" class="btn btn-success">
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
            format: 'DD-MM-YYYY'
        });
    })
</script>
@endpush
