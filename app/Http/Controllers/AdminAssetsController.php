<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Area;
use App\Models\Asset;
use App\Models\AssetModel;
use App\Models\Employee;
use App\Models\Supplier;
use Carbon\Carbon;
use Datatables;
use Illuminate\Database\Events\ModelsPruned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.assets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = AssetModel::all();
        $areas = Area::all();
        $suppliers = Supplier::all();
        $employees = Employee::all();
        return view('admin.assets.create', ['models' => $models, 'areas' => $areas,
    'suppliers' => $suppliers, 'employees' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'model_id' => 'required',
            'status' => 'required',
            'area_id' => 'required',
            'warranty' => 'required',
            'supplier_id' => 'required',
            'employee_id' => 'required'
        ];
        $messages = [
            'model_id.required' => 'Bạn phải chọn danh mục thiết bị.',
            'status.required' => 'Bạn phải nhập trạng thái.',
            'area_id.required' => 'Bạn phải chọn vị trí.',
            'warranty.required' => 'Bạn phải nhập số tháng bảo hành.',
            'supplier_id.required' => 'Bạn phải chọn nhà cung cấp.',
            'employee_id.required' => 'Bạn phải chọn người đang sử dụng tài sản.',
        ];
        $request->validate($rules,$messages);

        $asset = new Asset();
        $asset->serial = $request->serial;
        $asset->model_id = $request->model_id;
        $asset->status = $request->status;
        $asset->area_id = $request->area_id;
        if($request->purchasing_date){
            $asset->purchasing_date = Carbon::createFromFormat('d-m-Y', $request->purchasing_date);
        }
        $asset->warranty = $request->warranty;
        $asset->supplier_id = $request->supplier_id;
        $asset->purchase_cost = $request->purchase_cost;
        $asset->employee_id = $request->employee_id;
        $asset->note = $request->note;
        $asset->save();

        //Automatically generate the Tag based on Asset Model
        $tag = $this->setTag($request->model_id, $asset->id);
        $asset->tag = $tag;
        $asset->save();

        //Create the activity logs
        $log = new ActivityLog();
        $log->user_id = Auth::user()->id;
        $log->old_employee_id = 1;
        $log->new_employee_id = $asset->employee_id;
        $log->asset_id = $asset->id;
        $log->status = $asset->status;
        $log->save();

        Alert::toast('Tạo tài sản thành công!', 'success', 'top-right');
        return redirect()->route('admin.assets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asset = Asset::findOrFail($id);
        $logs = ActivityLog::where('asset_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.assets.show', ['asset' => $asset, 'logs' => $logs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asset = Asset::findOrFail($id);
        $models = AssetModel::all();
        $areas = Area::all();
        $suppliers = Supplier::all();
        $employees = Employee::all();
        return view('admin.assets.edit',
                    ['asset' => $asset,
                     'models' => $models,
                     'areas' => $areas,
                     'suppliers' => $suppliers,
                     'employees' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'model_id' => 'required',
            'status' => 'required',
            'area_id' => 'required',
            'warranty' => 'required',
            'supplier_id' => 'required',
            'employee_id' => 'required'
        ];
        $messages = [
            'model_id.required' => 'Bạn phải chọn danh mục thiết bị.',
            'status.required' => 'Bạn phải nhập trạng thái.',
            'area_id.required' => 'Bạn phải chọn vị trí.',
            'warranty.required' => 'Bạn phải nhập số tháng bảo hành.',
            'supplier_id.required' => 'Bạn phải chọn nhà cung cấp.',
            'employee_id.required' => 'Bạn phải chọn người đang sử dụng tài sản.',
        ];
        $request->validate($rules,$messages);

        $asset = Asset::findOrFail($id);
        $old_employee_id = $asset->employee_id;
        $old_status = $asset->status;

        $asset->serial = $request->serial;
        $asset->model_id = $request->model_id;
        $asset->status = $request->status;
        $asset->area_id = $request->area_id;
        if($request->purchasing_date){
            $asset->purchasing_date = Carbon::createFromFormat('d-m-Y', $request->purchasing_date);
        }
        $asset->warranty = $request->warranty;
        $asset->supplier_id = $request->supplier_id;
        $asset->purchase_cost = $request->purchase_cost;
        $asset->employee_id = $request->employee_id;
        $asset->note = $request->note;
        $asset->save();

        //Create the activity logs
        if($old_status != $asset->status
        || $old_employee_id != $asset->employee_id){
            $log = new ActivityLog();
            $log->user_id = Auth::user()->id;
            $log->old_employee_id = $old_employee_id;
            $log->new_employee_id = $asset->employee_id;
            $log->asset_id = $asset->id;
            $log->status = $asset->status;
            $log->save();
        }

        Alert::toast('Cập nhật thông tin thành công!', 'success', 'top-right');
        return view('admin.assets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->destroy($id);
        Alert::toast('Xóa tài sản thành công!', 'success', 'top-right');
        return redirect()->route('admin.assets.index');
    }


    public function anyData()
    {
        $assets = Asset::with(['model', 'area', 'supplier', 'employee'])->select(['id', 'tag', 'model_id', 'status', 'area_id', 'employee_id'])->orderBy('employee_id')->get();
        return Datatables::of($assets)
            ->addIndexColumn()
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
            ->addColumn('actions', function ($assets) {
                $action = '<a href="' . route("admin.assets.getChangeStatus", $assets->id) . '" class="btn btn-success btn-sm"><i class="fas fa-random"></i></a>
                           <a href="' . route("admin.assets.edit", $assets->id) . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                           <form style="display:inline" action="'. route("admin.assets.destroy", $assets->id) . '" method="POST">
                           <input type="hidden" name="_method" value="DELETE">
                           <button type="submit" name="submit" onclick="return confirm(\'Bạn có muốn xóa?\');" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                           <input type="hidden" name="_token" value="' . csrf_token(). '"></form>';
                return $action;
            })
            ->rawColumns(['tag', 'status', 'actions'])
            ->make(true);
    }

    public function getChangeStatus($id)
    {
        $asset = Asset::findOrFail($id);
        $employees = Employee::all();
        $areas = Area::all();
        return view('admin.assets.change_status',
                     ['asset' => $asset,
                       'employees' => $employees,
                       'areas' => $areas]);
    }

    public function updateStatus(Request $request, $id)
    {
        $rules = [
            'status' => 'required',
            'employee_id' => 'required',
            'area_id' => 'required',
        ];
        $messages = [
            'status.required' => 'Bạn phải chọn trạng thái.',
            'employee_id.required' => 'Bạn phải chọn nhân viên.',
            'area_id.required' => 'Bạn phải chọn vị trí.',
        ];
        $request->validate($rules,$messages);

        $asset = Asset::findOrFail($id);
        $old_employee_id = $asset->employee_id;
        $old_status = $asset->status;

        $asset->status = $request->status;
        $asset->employee_id = $request->employee_id;
        $asset->area_id = $request->area_id;
        $asset->save();

        //Create the activity logs
        if($old_status != $asset->status
        || $old_employee_id != $asset->employee_id){
            $log = new ActivityLog();
            $log->user_id = Auth::user()->id;
            $log->old_employee_id = $old_employee_id;
            $log->new_employee_id = $asset->employee_id;
            $log->asset_id = $asset->id;
            $log->status = $asset->status;
            $log->save();
        }

        Alert::toast('Cập nhật trạng thái thành công!', 'success', 'top-right');
        return redirect()->route('admin.assets.index');
    }

    private function setTag($model_id, $asset_id)
    {
        $model = AssetModel::findOrFail($model_id);
        return $model->category->code . '-' . $asset_id;
    }

}
