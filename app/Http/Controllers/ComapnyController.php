<?php

namespace App\Http\Controllers;

use App\Model\Comapny;
use App\Http\Controllers\CommonController;
use App\Http\Requests\Company\AddCompanyRequest;
use App\Http\Resources\Company\AddCompanyResource;
use App\Http\Resources\Company\CompanyListResource;
use Illuminate\Http\Request;

class ComapnyController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = CompanyListResource::collection(Comapny::orderBy('id','DESC')->paginate(6));
        return view('company.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCompanyRequest $request)
    {
        try {
            $result = Comapny::create($request->authorize());
            $this->uploadFile($request->file('image'),$result->image,'company');
            $retunStatus =  new AddCompanyResource($result);
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
     * @param  \App\Comapny  $comapny
     * @return \Illuminate\Http\Response
     */
    public function show(Comapny $comapny)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comapny  $comapny
     * @return \Illuminate\Http\Response
     */
    public function edit(Comapny $comapny)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comapny  $comapny
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comapny $comapny)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comapny  $comapny
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comapny $comapny)
    {
        // $is_deleted = Comapny::where(['id' => $comapny->id])->delete();
        // if ($is_deleted) {
        //     $notification = array(
        //         'message' => 'Record Deleted Successfully.',
        //         'alertType' => 'success',
        //     );
        // } else {
        //     $notification = array(
        //         'message' => 'Something went wrong.',
        //         'alertType' => 'error',
        //     );
        // }
        // return $notification;
    }
    public function delete($id)
    {
        $is_deleted = Comapny::where(['id' => $id])->delete();
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
