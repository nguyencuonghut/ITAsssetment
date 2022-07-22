@section('title')
{{ 'Chi tiết' }}
@endsection

@extends('layouts.base')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Chi tiết {{$asset->tag}}</h1>
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
                            <h3 class="card-title">Chi tiết tài sản</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6"><strong>Trạng thái</strong></div>
                                @if($asset->status == 'Đã cấp phát')
                                    <div class="col-6"><span class="badge badge-success">{{$asset->status}}</span></div>
                                @elseif($asset->status == 'Đã thu hồi')
                                    <div class="col-6"><span class="badge badge-danger">{{$asset->status}}</span></div>
                                @elseif($asset->status == 'Sẵn sàng cấp phát')
                                    <div class="col-6"><span class="badge badge-primary">{{$asset->status}}</span></div>
                                @elseif($asset->status == 'Hỏng - Không sửa được')
                                    <div class="col-6"><span class="badge badge-warning">{{$asset->status}}</span></div>
                                @elseif($asset->status == 'Hỏng - Mang đi sửa')
                                    <div class="col-6"><span class="badge badge-info">{{$asset->status}}</span></div>
                                @elseif($asset->status == 'Đã thất lạc')
                                    <div class="col-6"><span class="badge badge-dark">{{$asset->status}}</span></div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Tag</strong></div>
                                <div class="col-6">{{$asset->tag}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Serial</strong></div>
                                <div class="col-6">{{$asset->serial}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Model</strong></div>
                                <div class="col-6">{{$asset->model->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Danh mục thiết bị</strong></div>
                                <div class="col-6">{{$asset->model->category->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Ngày mua</strong></div>
                                @if($asset->purchasing_date)
                                <div class="col-6">{{date('d-m-Y', strtotime($asset->purchasing_date))}}</div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Số tháng bảo hành</strong></div>
                                <div class="col-6">{{$asset->warranty}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Giá trị (VNĐ)</strong></div>
                                <div class="col-6">{{ number_format($asset->purchase_cost, 0, ',', ',') }} VNĐ</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Nhà cung cấp</strong></div>
                                <div class="col-6">{{$asset->supplier->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Nhân viên</strong></div>
                                <div class="col-6">{{$asset->employee->email}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Vị trí</strong></div>
                                <div class="col-6">{{$asset->area->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-6"><strong>Nhãn</strong></div>
                                <div class="col-6">
                                    <a href="{{route('assets.createQR', $asset->id)}}">
                                        <button class="btn btn-xs btn-secondary"><i class="fas fa-barcode"> Tạo mã</i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Lịch sử</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Ngày</th>
                                    <th>Admin</th>
                                    <th>Hành động</th>
                                    <th>Tài sản</th>
                                    <th>Chủ cũ</th>
                                    <th>Chủ mới</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $item)
                                    <tr>
                                        <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                        <td>{{$item->user->name}}</td>
                                        @if($item->status == 'Đã cấp phát')
                                        <td><span class="badge badge-success">{{$item->status}}</span></td>
                                        @elseif($item->status == 'Đã thu hồi')
                                        <td><span class="badge badge-danger">{{$item->status}}</span></td>
                                        @elseif($item->status == 'Sẵn sàng cấp phát')
                                        <td><span class="badge badge-primary">{{$item->status}}</span></td>
                                        @elseif($item->status == 'Hỏng - Không sửa được')
                                        <td><span class="badge badge-warning">{{$item->status}}</span></td>
                                        @elseif($item->status == 'Hỏng - Mang đi sửa')
                                        <td><span class="badge badge-info">{{$item->status}}</span></td>
                                        @elseif($item->status == 'Đã thất lạc')
                                        <td><span class="badge badge-dark">{{$item->status}}</span></td>
                                        @endif
                                        <td>{{$item->asset->tag}}</td>
                                        <td>{{$item->old_employee->email}}</td>
                                        <td>{{$item->new_employee->email}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
