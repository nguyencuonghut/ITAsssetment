<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\AssetModel;
use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAssetModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('admin.models.index', ['categories' => $categories, 'manufacturers' => $manufacturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('admin.models.create', ['categories' => $categories, 'manufacturers' => $manufacturers]);
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
            'name' => 'required|max:255|unique:asset_models',
            'manufacturer_id' => 'required',
            'category_id' => 'required',
        ];
        $messages = [
            'name.required' => 'Bạn phải nhập tên.',
            'name.max' => 'Tên dài quá 255 ký tự.',
            'name.unique' => 'Tên đã tồn tại.',
            'manufacturer_id.required' => 'Bạn phải chọn hãng sản xuất.',
            'category_id.required' => 'Bạn phải chọn danh mục tài sản.'
        ];
        $request->validate($rules,$messages);

        $model = new AssetModel();
        $model->name = $request->name;
        $model->manufacturer_id = $request->manufacturer_id;
        $model->category_id = $request->category_id;
        $model->model_no = $request->model_no;
        $model->save();

        Alert::toast('Tạo model thiết bị thành công!', 'success', 'top-right');
        return redirect()->route('admin.models.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.models.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = AssetModel::findOrFail($id);
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        return view('admin.models.edit', ['model' => $model,  'categories' => $categories, 'manufacturers' => $manufacturers]);
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
            'name' => 'required|max:255',
            'manufacturer_id' => 'required',
            'category_id' => 'required',
        ];
        $messages = [
            'name.required' => 'Bạn phải nhập tên.',
            'name.max' => 'Tên dài quá 255 ký tự.',
            'manufacturer_id.required' => 'Bạn phải chọn hãng sản xuất.',
            'category_id.required' => 'Bạn phải chọn danh mục tài sản.'
        ];
        $request->validate($rules,$messages);

        $model = AssetModel::findOrFail($id);
        $model->name = $request->name;
        $model->manufacturer_id = $request->manufacturer_id;
        $model->category_id = $request->category_id;
        $model->model_no = $request->model_no;
        $model->save();

        Alert::toast('Cập nhật thông tin thành công!', 'success', 'top-right');
        return view('admin.models.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = AssetModel::findOrFail($id);
        $model->destroy($id);
        Alert::toast('Xóa model thiết bị thành công!', 'success', 'top-right');
        return redirect()->route('admin.models.index');
    }


    public function anyData()
    {
        $models = AssetModel::with(['manufacturer', 'category'])->select(['id', 'name', 'manufacturer_id', 'category_id', 'model_no'])->orderBy('manufacturer_id')->get();
        return Datatables::of($models)
            ->addIndexColumn()
            ->editColumn('name', function ($models) {
                return $models->name;
            })
            ->editColumn('manufacturer', function ($models) {
                return $models->manufacturer->name;
            })
            ->editColumn('category', function ($models) {
                return $models->category->name;
            })
            ->editColumn('model_no', function ($models) {
                return $models->model_no;
            })
            ->addColumn('actions', function ($models) {
                $action = '<a href="' . route("admin.models.edit", $models->id) . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                           <form style="display:inline" action="'. route("admin.models.destroy", $models->id) . '" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" name="submit" onclick="return confirm(\'Bạn có muốn xóa?\');" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    <input type="hidden" name="_token" value="' . csrf_token(). '"></form>';
                return $action;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
