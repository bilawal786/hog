<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverLeadsResources extends JsonResource
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
            'ride_id' => $this->ride_id,
            'name' => $this->leads->Fname." ".$this->leads->Lname,
            'cost'=> $this->cost,
            'notes' => $this->notes,
            'status' => $this->status,
            'trip_date' => $this->leads->trip_date,
        ];
    }
}
