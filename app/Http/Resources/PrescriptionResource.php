<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'medicine' => MedicineResource::make($this->whenLoaded('medicine')),
            'schedule_type' => $this->scheduleable_type,
            'schedule' => $this->scheduleable,
            'dosage' => $this->dosage,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}
