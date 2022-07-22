<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminManufacturersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manufacturers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufacturers.create');
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
            'name' => 'required|max:255|unique:manufacturers',
        ];
        $messages = [
            'name.required' => 'Bạn phải nhập tên.',
            'name.max' => 'Tên dài quá 255 ký tự.',
            'name.unique' => 'Tên đã tồn tại.',
        ];
        $request->validate($rules,$messages);

        $manufacturer = new Manufacturer();
        $manufacturer->name = $request->name;
        $manufacturer->save();

        Alert::toast('Tạo hãng sản xuất thành công!', 'success', 'top-right');
        return redirect()->route('admin.manufacturers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.manufacturers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        return view('admin.manufacturers.edit', ['manufacturer' => $manufacturer]);
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
        ];
        $messages = [
            'name.required' => 'Bạn phải nhập tên.',
            'name.max' => 'Tên dài quá 255 ký tự.',
        ];
        $request->validate($rules,$messages);
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->name = $request->name;
        $manufacturer->save();

        Alert::toast('Cập nhật thông tin thành công!', 'success', 'top-right');
        return view('admin.manufacturers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->destroy($id);
        Alert::toast('Xóa hãng sản xuất thành công!', 'success', 'top-right');
        return redirect()->route('admin.manufacturers.index');
    }


    public function anyData()
    {
        $manufacturers = Manufacturer::select(['id', 'name'])->get();
        return Datatables::of($manufacturers)
            ->addIndexColumn()
            ->editColumn('name', function ($manufacturers) {
                return $manufacturers->name;
            })
            ->addColumn('actions', function ($manufacturers) {
                $action = '<a href="' . route("admin.manufacturers.edit", $manufacturers->id) . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                           <form style="display:inline" action="'. route("admin.manufacturers.destroy", $manufacturers->id) . '" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" name="submit" onclick="return confirm(\'Bạn có muốn xóa?\');" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    <input type="hidden" name="_token" value="' . csrf_token(). '"></form>';
                return $action;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
