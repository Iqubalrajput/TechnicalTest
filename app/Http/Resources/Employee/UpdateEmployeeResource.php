<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\JsonResource;

class UpdateEmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $request->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'company' => $request->company,
            'created_at' => optional($request->created_at)->format("Y-m-d H:i:s"),
            'updated_at' => optional($request->updated_at)->format("Y-m-d H:i:s")
        ];
    }
}
