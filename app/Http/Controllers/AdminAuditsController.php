<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetAudit;
use App\Notifications\AuditRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Datatables;

class AdminAuditsController extends Controller
{
    public function audit()
    {
        return view('admin.audits.audit');
    }

    public function doAudit(Request $request)
    {
        $rules = [
            'asset_ids' => 'required',
        ];
        $messages = [
            'asset_ids.required' => 'Bạn phải chọn tài sản để kiểm kê',
        ];
        $request->validate($rules,$messages);

        //Send email to request User confirm the asset
        foreach($request->asset_ids as $key => $value){
            $asset = Asset::findOrFail($value);
            //Create the asset_audits table
            $asset_audit = new AssetAudit();
            $asset_audit->request_time = Carbon::now();
            $asset_audit->request_time = Carbon::now();
            $asset_audit->asset_id = $asset->id;
            $asset_audit->employee_id = $asset->employee->id;
            $asset_audit->result = null;
            $asset_audit->token = Str::random(64);
            $asset_audit->save();
            //Send email
            Notification::route('mail' , $asset->employee->email)->notify(new AuditRequest($asset_audit->id, $asset_audit->token));
        }

        Alert::toast('Gửi yêu cầu kiểm kê tài sản tới người sở hữu thành công!', 'success', 'top-right');
        return redirect()->back();
    }

    public function anyData()
    {
        $assets = Asset::where('status', 'Đã cấp phát')->with(['model', 'area', 'supplier', 'employee'])->select(['id', 'tag', 'model_id', 'status', 'area_id', 'employee_id'])->orderBy('employee_id')->get();
        return Datatables::of($assets)
            ->editColumn('tag', function ($assets) {
                return '<a href="'.route('admin.assets.show', $assets->id).'">'.$assets->tag.'</a>';
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
                return $assets->employee->email;
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
            ->editColumn('check', function ($assets) {
                return '<input type="checkbox" name=asset_ids[]" value="' . $assets->id . '">';
            })
            ->rawColumns(['tag', 'status', 'check'])
            ->make(true);
    }
}
