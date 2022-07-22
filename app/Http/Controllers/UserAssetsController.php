<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Asset;
use Illuminate\Http\Request;
use Datatables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserAssetsController extends Controller
{
    public function index()
    {
        return view('user.assets.index');
    }

    public function anyData()
    {
        $assets = Asset::with(['model', 'area', 'supplier', 'employee'])->select(['id', 'tag', 'model_id', 'status', 'area_id', 'employee_id'])->orderBy('employee_id')->get();
        return Datatables::of($assets)
            ->addIndexColumn()
            ->editColumn('tag', function ($assets) {
                return '<a href="'.route('assets.show', $assets->id).'">'.$assets->tag.'</a>';
            })
            ->editColumn('category', function ($assets) {
                return $assets->model->category->name;
            })
            ->editColumn('model', function ($assets) {
                return $assets->model->manufacturer->name . ' ' . $assets->model->name;
            })
            ->editColumn('area', function ($assets) {
                return $assets->area->name;
            })
            ->editColumn('employee', function ($assets) {
                return $assets->employee->name;
            })
            ->editColumn('status', function ($assets) {
                if($assets->status == 'Đã cấp phát') {
                    return '<span class="badge badge-success">Đã cấp phát</span>';
                } else if($assets->status == 'Đã thu hồi'){
                    return '<span class="badge badge-danger">Đã thu hồi</span>';
                } else if($assets->status == 'Sẵn sàng cấp phát'){
                    return '<span class="badge badge-primary">Sẵn sàng cấp phát</span>';
                } else if($assets->status == 'Hỏng - Không sửa được'){
                    return '<span class="badge badge-warning">Hỏng - Không sửa được</span>';
                } else if($assets->status == 'Hỏng - Mang đi sửa'){
                    return '<span class="badge badge-info">Hỏng - Mang đi sửa</span>';
                } else if($assets->status == 'Đã thất lạc'){
                    return '<span class="badge badge-dark">Đã thất lạc</span>';
                }
                return $assets->status;
            })
            ->rawColumns(['tag', 'status'])
            ->make(true);
    }

    public function show($id)
    {
        $asset = Asset::findOrFail($id);
        $logs = ActivityLog::where('asset_id', $id)->orderBy('id', 'desc')->get();
        return view('user.assets.show', ['asset' => $asset, 'logs' => $logs]);
    }

    public function createQR($id)
    {
        $asset = Asset::findOrFail($id);
        QrCode::size(500)
            ->format('png')
            ->generate('http://localhost:8000/assets/' . $id, public_path('images/' . 'QR-' . $asset->tag . '.png'));

        return view('user.assets.qrcode', ['asset' => $asset]);
    }
}
