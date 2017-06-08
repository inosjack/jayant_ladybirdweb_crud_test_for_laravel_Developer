<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Reply;
use App\Employee;
use App\Http\Controllers\AdminBaseController;
use App\Http\Requests;
use App\Asset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;

class EmployeeController extends AdminBaseController
{
    //

    public function __construct() {
        parent::__construct();
        $this->pageTitle = "Employees Management";
    }

    /**
     * @return mixed
     * To show index page
     */
    public function index() {
        return \View::make('employees.index', $this->data);
    }

    /**
     * @return mixed
     * to show add Employee model
     */
    public function create() {
        return \View::make('employees.create-edit', $this->data);
    }


    /**
     * @return mixed
     * Fetch Data For Data Table
     */
    public function ajax_employees()
    {
        $employees = Employee::select('id', 'name', 'email', 'designation', 'date_of_birth', 'gender', 'created_at');
        $data = Datatables::of($employees)
            ->addColumn(
                'action',
                function($row) {
                    // Edit Button
                    $string = '<button onclick="editModal('.$row->id.')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button> ';
                    //Delete Button
                    $string .= '<button onclick="deleteAlert('.$row->id.',\''.addslashes($row->name).'\')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                    return $string;
                }
            )
            ->editColumn(
                'created_at',
                function ($row) {
                    return Carbon::parse($row->created_at)->format('d F, Y');
                }
            )
            ->editColumn(
                'date_of_birth',
                function ($row) {
                    return Carbon::createFromFormat('Y-m-d', $row->date_of_birth)
                        ->diff(Carbon::now())
                        ->format('%y years, %m months and %d days');
                }
            )

            ->editColumn(
                'gender',
                function ($row) {
                    $color = ['male' => 'aqua-active', 'female' => 'maroon'];
                    return ucfirst($row->gender);
//                    return "<span id='status{$row->id}' class='label bg-{$color[$row->gender]} disabled color-palette'> <i class='fa fa-{$row->gender}'></i>$row->gender</span>";
                }
            )
            ->make(true);
        return $data;
    }

    /**
     * @param Requests\EmployeeStoreRequest $request
     * @return array
     * Store A a new Employee
     */
    public function store(Requests\EmployeeStoreRequest $request) {

        $employee = new Employee();
        $employee->name  = $request->get('name');
        $employee->email = $request->get('email');
        $employee->designation = $request->get('designation');
        $employee->contact_number = $request->get('contact_number');
        $employee->date_of_birth   = Carbon::parse($request->get('date_of_birth'))->format('Y-m-d');
        $employee->joining_date   = Carbon::parse($request->get('joining_date'))->format('Y-m-d');
        $employee->exit_date   = Carbon::parse($request->get('exit_date'))->format('Y-m-d');
        $employee->gender   = $request->get('gender');
        $employee->password = Hash::make($request->get('password'));
        $employee->save();

        return Reply::success('Created Successfully');
    }

    /**
     * @param $id
     * @return mixed
     * Show Asset Edit Asset Model
     */
    public function edit($id) {
        $this->employee = Employee::find($id);
        return $this->create();
    }

    /**
     * @param Requests\EmployeeUpdateRequest $request
     * @param $id
     * @return array
     *
     * Update a Employee
     */

    public function update(Requests\EmployeeUpdateRequest $request,$id) {

        $employee = Employee::find($id);
        $employee->name  = $request->get('name');
        $employee->email = $request->get('email');
        $employee->designation = $request->get('designation');
        $employee->contact_number = $request->get('contact_number');
        $employee->date_of_birth   = Carbon::parse($request->get('date_of_birth'))->format('Y-m-d');
        $employee->joining_date   = Carbon::parse($request->get('joining_date'))->format('Y-m-d');
        $employee->exit_date   = Carbon::parse($request->get('exit_date'))->format('Y-m-d');
        $employee->gender   = $request->get('gender');
        $employee->password = Hash::make($request->get('password'));
        $employee->save();

        return Reply::success('Updated Successfully');
    }

    /**
     * @param $id
     * @return array
     * Delete Employee Form Record
     */
    public function destroy($id) {
        Employee::destroy($id);
        return Reply::success('Successfully Deleted');
    }


}
