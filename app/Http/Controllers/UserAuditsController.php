<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetAudit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Datatables;

class UserAuditsController extends Controller
{

    public function index()
    {
        $audit_requests = AssetAudit::all();
        return view('user.audits.index', ['audit_requests' => $audit_requests]);
    }

    public function confirmation($id, $token)
    {
        $asset_audit = AssetAudit::findOrFail($id);
        return view('user.audits.confirmation', ['token' => $token,'asset_audit' => $asset_audit]);
    }

    public function doConfirmation(Request $request)
    {
        $rules = [
            'asset_audit_id' => 'required',
            'token' => 'required',
            'result' => 'required'
        ];
        $messages = [
            'asset_audit_id.required' => 'Bạn phải nhập Id kiểm kê',
            'token.required' => 'Đường link xác nhận không có token',
            'result.required' => 'Bạn phải chọn xác nhận Đúng hoặc Sai',
        ];
        $request->validate($rules,$messages);

        $asset_audit = AssetAudit::findOrFail($request->asset_audit_id);
        if($request->token != $asset_audit->token){
            Alert::toast('Token không hợp lệ!', 'error', 'top-right');
            return redirect()->back();
        }else{
            $asset_audit->result = $request->result;
            $asset_audit->confirmation_time = Carbon::now();
            $asset_audit->token = null;
            $asset_audit->save();

            Alert::toast('Xác nhận kiểm kê thành công!', 'success', 'top-right');
            return redirect()->route('audits.index');;
        }
    }

    public function anyData()
    {
        $asset_audits = AssetAudit::with(['employee', 'asset'])->select(['id', 'employee_id', 'asset_id', 'result', 'request_time', 'confirmation_time'])->orderBy('request_time')->get();
        return Datatables::of($asset_audits)
            ->addIndexColumn()
            ->editColumn('employee', function ($asset_audits) {
                return $asset_audits->employee->email;
            })
            ->editColumn('asset', function ($asset_audits) {
                return $asset_audits->asset->tag . ' (' . $asset_audits->asset->model->category->name . ' ' . $asset_audits->asset->model->manufacturer->name . ' ' . $asset_audits->asset->model->name . ')    ';
            })
            ->editColumn('result', function ($asset_audits) {
                if($asset_audits->result == 'Đúng') {
                    return '<span class="badge badge-success">Đúng</span>';
                } else if($asset_audits->result == 'Sai'){
                    return '<span class="badge badge-danger">Sai</span>';
                }
            })
            ->editColumn('request_time', function ($asset_audits) {
                return date('d-m-Y H:i', strtotime($asset_audits->request_time));
            })
            ->editColumn('confirmation_time', function ($asset_audits) {
                if(null != $asset_audits->confirmation_time){
                    return date('d-m-Y H:i', strtotime($asset_audits->confirmation_time));
                }else{
                    return null;
                }
            })
            ->rawColumns(['result'])
            ->make(true);
    }
}
