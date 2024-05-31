<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Store::orderBy('id','desc')->paginate('2');
        return view('index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:stores,email|email',
            'joining_date'=>'required',
            'joining_salary'=>'required|numeric',
            'is_active'=>'required'
        ],
        [
            'name.required' => 'it should not be empty',
            'email.required' => 'it should not be empty',
            'email.unique'=> 'it should be unique'
        ]);
        $data=$request ->all();
        Store::create($data);
       return redirect()->route('welcome')->withMessage('Employee created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Store::find($id);
       return view('show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $employee)
    {
        //$employee = Store::find($id);
        return view('edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $employee)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:stores,email,'.$employee->id.'|email',
            'joining_date'=>'required',
            'joining_salary'=>'required|numeric',
            'is_active'=>'required'
        ],
        [
            'name.required' => 'it should not be empty',
            'email.required' => 'it should not be empty',
            'email.unique'=> 'it should be unique'
        ]);
        $data = $request->all();
        //$employee= Store::find($id);
        $employee->update($data);
        return redirect()->route('welcome')->withMessage('Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $employee)
    {
        $employee->delete();
        return redirect()->route('welcome')->withMessage('Employee has been successfully deleted');
    }
    public function delete(Store $employee)
    {
        return view('delete', compact('employee'));
    }
}
