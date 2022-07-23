@section('title')
{{ 'Kiểm kê tài sản' }}
@endsection

@extends('layouts.base')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kiểm kê {{$asset_audit->asset->tag}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Kiểm kê tài sản</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6"><strong>Trạng thái</strong></div>
                                @if($asset_audit->asset->status == 'Đã cấp phát')
                                    <div class="col-6"><span class="badge badge-success">{{$asset_audit->asset->status}}</span></div>
                                @elseif($asset_audit->asset->status == 'Đã thu hồi')
                                    <div class="col-6"><span class="badge badge-danger">{{$asset_audit->asset->status}}</span></div>
                                @elseif($asset_audit->asset->status == 'Sẵn sàng cấp phát')
                                    <div class="col-6"><span class="badge badge-primary">{{$asset_audit->asset->status}}</span></div>
                                @elseif($asset_audit->asset->status == 'Hỏng - Không sửa được')
                                    <div class="col-6"><span class="badge badge-warning">{{$asset_audit->asset->status}}</span></div>
                                @elseif($asset_audit->asset->status == 'Hỏng - Mang đi sửa')
                                    <div class="col-6"><span class="badge badge-info">{{$asset_audit->asset->status}}</span></div>
                                @elseif($asset_audit->asset->status == 'Đã thất lạc')
                                    <div class="col-6"><span class="badge badge-dark">{{$asset_audit->asset->status}}</span></div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Tag</strong></div>
                                <div class="col-6">{{$asset_audit->asset->tag}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Serial</strong></div>
                                <div class="col-6">{{$asset_audit->asset->serial}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Model</strong></div>
                                <div class="col-6">{{$asset_audit->asset->model->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Danh mục thiết bị</strong></div>
                                <div class="col-6">{{$asset_audit->asset->model->category->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Ngày mua</strong></div>
                                <div class="col-6">{{date('d-m-Y', strtotime($asset_audit->asset->purchasing_date))}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Số tháng bảo hành</strong></div>
                                <div class="col-6">{{$asset_audit->asset->warranty}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Giá trị (VNĐ)</strong></div>
                                <div class="col-6">{{ number_format($asset_audit->asset->purchase_cost, 0, ',', ',') }} VNĐ</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Nhà cung cấp</strong></div>
                                <div class="col-6">{{$asset_audit->asset->supplier->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Nhân viên</strong></div>
                                <div class="col-6">{{$asset_audit->asset->employee->email}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Vị trí</strong></div>
                                <div class="col-6">{{$asset_audit->asset->area->name}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form class="form-horizontal" method="post" action="{{ url('audits/doConfirmation') }}" name="do_confirmation" id="do_confirmation" novalidate="novalidate">{{ csrf_field() }}
                            @method('PATCH')
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="asset_audit_id" value="{{ $asset_audit->id }}">
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="col-12">
                                        <div class="control-group">
                                            <label class="required-field" class="control-label">Xác nhận</label>
                                            <div class="controls">
                                                <select name="result" id="result" data-placeholder="Chọn" class="form-control select2">
                                                    <option selected="selected" disabled>Chọn</option>
                                                    <option value="Đúng">Đúng</option>
                                                    <option value="Sai">Sai</option>
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
