<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required|max:255|unique:categories',
            'type' => 'required',
            'code' => 'required'
        ];
        $messages = [
            'name.required' => 'Bạn phải nhập tên.',
            'name.max' => 'Tên dài quá 255 ký tự.',
            'name.unique' => 'Tên đã tồn tại.',
            'type.required' => 'Bạn phải chọn kiểu.',
            'code.required' => 'Bạn phải nhập mã.',
        ];
        $request->validate($rules,$messages);

        $category = new Category();
        $category->name = $request->name;
        $category->type = $request->type;
        $category->code = $request->code;
        $category->save();

        Alert::toast('Tạo danh mục thiết bị thành công!', 'success', 'top-right');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', ['category' => $category]);
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
            'type' => 'required',
            'code' => 'required',
        ];
        $messages = [
            'name.required' => 'Bạn phải nhập tên.',
            'name.max' => 'Tên dài quá 255 ký tự.',
            'type.required' => 'Bạn phải nhập kiểu.',
            'code.required' => 'Bạn phải nhập mã.'
        ];
        $request->validate($rules,$messages);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->type = $request->type;
        $category->code = $request->code;
        $category->save();

        Alert::toast('Cập nhật thông tin thành công!', 'success', 'top-right');
        return view('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->destroy($id);
        Alert::toast('Xóa danh mục thiết bị thành công!', 'success', 'top-right');
        return redirect()->route('admin.categories.index');
    }


    public function anyData()
    {
        $categories = Category::select(['id', 'name', 'type', 'code'])->orderBy('type')->get();
        return Datatables::of($categories)
            ->addIndexColumn()
            ->editColumn('name', function ($categories) {
                return $categories->name;
            })
            ->editColumn('code', function ($categories) {
                return $categories->code;
            })
            ->editColumn('type', function ($categories) {
                return $categories->type;
            })
            ->addColumn('actions', function ($categories) {
                $action = '<a href="' . route("admin.categories.edit", $categories->id) . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                           <form style="display:inline" action="'. route("admin.categories.destroy", $categories->id) . '" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" name="submit" onclick="return confirm(\'Bạn có muốn xóa?\');" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    <input type="hidden" name="_token" value="' . csrf_token(). '"></form>';
                return $action;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
