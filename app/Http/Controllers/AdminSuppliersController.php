<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliers.create');
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
            'name' => 'required|max:255|unique:suppliers',
            'address' => 'required',
            'mobile' => 'required|numeric|digits:10'
        ];
        $messages = [
            'name.required' => 'Bạn phải nhập tên.',
            'name.max' => 'Tên dài quá 255 ký tự.',
            'name.unique' => 'Tên đã tồn tại.',
            'address.required' => 'Bạn phải nhập địa chỉ.',
            'mobile.required' => 'Bạn phải nhập số điện thoại.',
            'mobile.numeric' => 'Số điện thoại chỉ bao gồm các số từ 0 - 9.',
            'mobile.digits' => 'Số điện thoại phải bao gồm 10 chữ số.'
        ];
        $request->validate($rules,$messages);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->mobile = $request->mobile;
        $supplier->save();

        Alert::toast('Tạo nhà cung cấp thành công!', 'success', 'top-right');
        return redirect()->route('admin.suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.suppliers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.suppliers.edit', ['supplier' => $supplier]);
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
            'name' => 'required|max:255|unique:suppliers',
            'address' => 'required',
            'mobile' => 'required|numeric|size:10'
        ];
        $messages = [
            'name.required' => 'Bạn phải nhập tên.',
            'name.max' => 'Tên dài quá 255 ký tự.',
            'name.unique' => 'Tên đã tồn tại.',
            'address.required' => 'Bạn phải nhập địa chỉ.',
            'mobile.required' => 'Bạn phải nhập số điện thoại.',
            'mobile.numeric' => 'Số điện thoại chỉ bao gồm các số từ 0 - 9.',
            'mobile.size' => 'Số điện thoại phải bao gồm 10 chữ số.'
        ];
        $request->validate($rules,$messages);

        $supplier = Supplier::findOrFail($id);
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->mobile = $request->mobile;
        $supplier->save();

        Alert::toast('Cập nhật thông tin thành công!', 'success', 'top-right');
        return view('admin.suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->destroy($id);
        Alert::toast('Xóa nhà cung cấp thành công!', 'success', 'top-right');
        return redirect()->route('admin.suppliers.index');
    }


    public function anyData()
    {
        $suppliers = Supplier::select(['id', 'name', 'address', 'mobile'])->get();
        return Datatables::of($suppliers)
            ->addIndexColumn()
            ->editColumn('name', function ($suppliers) {
                return $suppliers->name;
            })
            ->editColumn('address', function ($suppliers) {
                return $suppliers->address;
            })
            ->editColumn('mobile', function ($suppliers) {
                return $suppliers->mobile;
            })
            ->addColumn('actions', function ($suppliers) {
                $action = '<a href="' . route("admin.suppliers.edit", $suppliers->id) . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                           <form style="display:inline" action="'. route("admin.suppliers.destroy", $suppliers->id) . '" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" name="submit" onclick="return confirm(\'Bạn có muốn xóa?\');" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    <input type="hidden" name="_token" value="' . csrf_token(). '"></form>';
                return $action;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
