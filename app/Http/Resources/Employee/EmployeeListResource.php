<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeListResource extends JsonResource
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
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'company' => $this->company,
            'created_at' => optional($this->created_at)->format("Y-m-d H:i:s"),
            'updated_at' => optional($this->updated_at)->format("Y-m-d H:i:s")
        ];
    }
}
