<?php

namespace App\Http\Controllers;

use App\Model\Employee;
use App\Model\Comapny;
use App\Http\Controllers\CommonController;
use App\Http\Requests\Employee\AddEmployeeRequest;
use App\Http\Requests\Employee\UdateEmployeeRequest;
use App\Http\Resources\Employee\AddEmployeeResource;
use App\Http\Resources\Employee\UpdateEmployeeResource;
use App\Http\Resources\Employee\EmployeeListResource;
use Illuminate\Http\Request;

class EmployeeController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = EmployeeListResource::collection(Employee::with('company')->orderBy('id','DESC')->paginate(6));
        return view('employee.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $data = Comapny::all();
        return view('employee.create')->with(compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddEmployeeRequest $request)
    {
        try {
            $result = Employee::create($request->authorize());
            $retunStatus =  new AddEmployeeResource($result);
            return $notification = array(
                'data' => $retunStatus,
                'message' => 'Record Save Successfully.',
                'alertType' => 'success',
            );

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'Error',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'Error',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
       
        $Comapny = Comapny::orderBy('id','DESC')->get();
        return view('employee.edit')->with(compact('employee','Comapny'));
        // return view('employee.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UdateEmployeeRequest $request, Employee $employee)
    {
        try {
            $result = Employee::find($employee->id)->update($request->authorize());
            $retunStatus =  new UpdateEmployeeResource($result);
            return $notification = array(
                'data' => $retunStatus,
                'message' => 'Record Update Successfully.',
                'alertType' => 'success',
            );

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'Error',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'Error',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
    public function delete($id)
    {
        $is_deleted = Employee::where(['id' => $id])->delete();
        if ($is_deleted) {
            $notification = array(
                'message' => 'Record Deleted Successfully.',
                'alertType' => 'success',
            );
        } else {
            $notification = array(
                'message' => 'Something went wrong.',
                'alertType' => 'error',
            );
        }
        return $notification;
    }
}
