<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Datatables;

class UserActivityLogsController extends Controller
{
    public function anyData()
    {
        $logs = ActivityLog::with(['user', 'old_employee', 'new_employee', 'asset'])->orderBy('id', 'desc')->get();
        return Datatables::of($logs)
            ->editColumn('created_at', function ($logs) {
                return date('d-m-Y',strtotime($logs->created_at));
            })
            ->editColumn('old_employee', function ($logs) {
                return $logs->old_employee->email;
            })
            ->editColumn('new_employee', function ($logs) {
                return $logs->new_employee->email;
            })
            ->editColumn('asset', function ($logs) {
                return $logs->asset->model->category->name . ' ' . $logs->asset->model->manufacturer->name . ' ' . $logs->asset->model->name;
            })
            ->editColumn('status', function ($logs) {
                if($logs->status == 'Đã cấp phát') {
                    return '<span class="badge badge-success">Đã cấp phát</span>';
                } else if($logs->status == 'Đã thu hồi'){
                    return '<span class="badge badge-danger">Đã thu hồi</span>';
                } else if($logs->status == 'Sẵn sàng cấp phát'){
                    return '<span class="badge badge-primary">Sẵn sàng cấp phát</span>';
                } else if($logs->status == 'Hỏng - Không sửa được'){
                    return '<span class="badge badge-warning">Hỏng - Không sửa được</span>';
                } else if($logs->status == 'Hỏng - Mang đi sửa'){
                    return '<span class="badge badge-info">Hỏng - Mang đi sửa</span>';
                } else if($logs->status == 'Đã thất lạc'){
                    return '<span class="badge badge-dark">Đã thất lạc</span>';
                }
                return $logs->status;
            })
            ->rawColumns(['status'])
            ->make(true);
    }
}
