<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Datatables;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminEmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.employees.create', ['departments' => $departments]);
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:employees',
            'department_id' => 'required',
        ];
        $messages = [
            'name.required' => 'Bạn phải nhập tên.',
            'name.max' => 'Tên dài quá 255 ký tự.',
            'email.required' => 'Bạn phải nhập địa chỉ email.',
            'email.email' => 'Email sai định dạng.',
            'email.unique' => 'Email đã tồn tại',
            'department_id.required' => 'Bạn phải chọn phòng ban.',
        ];
        $request->validate($rules,$messages);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->department_id = $request->department_id;
        $employee->save();

        Alert::toast('Tạo nhân viên thành công!', 'success', 'top-right');
        return redirect()->route('admin.employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.employees.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        return view('admin.employees.edit', ['employee' => $employee, 'departments' => $departments]);
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
            'email' => 'required|email',
            'department_id' => 'required'
        ];
        $messages = [
            'name.required' => 'Bạn phải nhập tên.',
            'name.max' => 'Tên dài quá 255 ký tự.',
            'email.required' => 'Bạn phải nhập địa chỉ email.',
            'email.email' => 'Email sai định dạng.',
            'department_id.required' => 'Bạn phải chọn phòng ban',
        ];
        $request->validate($rules,$messages);

        $employee = Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->department_id = $request->department_id;
        $employee->save();

        Alert::toast('Cập nhật thông tin thành công!', 'success', 'top-right');
        return view('admin.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->destroy($id);
        Alert::toast('Xóa nhân viên thành công!', 'success', 'top-right');
        return redirect()->route('admin.employees.index');
    }


    public function anyData()
    {
        $employees = Employee::with('department')->select(['id', 'name', 'email', 'department_id'])->orderBy('department_id')->get();
        return Datatables::of($employees)
            ->addIndexColumn()
            ->editColumn('name', function ($employees) {
                return $employees->name;
            })
            ->editColumn('email', function ($employees) {
                return $employees->email;
            })
            ->editColumn('department', function ($employees) {
                return $employees->department->name;
            })
            ->addColumn('actions', function ($employees) {
                $action = '<a href="' . route("admin.employees.edit", $employees->id) . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                           <form style="display:inline" action="'. route("admin.employees.destroy", $employees->id) . '" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" name="submit" onclick="return confirm(\'Bạn có muốn xóa?\');" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    <input type="hidden" name="_token" value="' . csrf_token(). '"></form>';
                return $action;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
