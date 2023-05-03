<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'first_name' => (string)$this->first_name,
            'last_name' => (string)$this->last_name,
            'email' => (string)$this->email,
            'date_profiled' => (string)$this->date_profiled,
            'primary_legal_counsel' => (string)$this->primary_legal_counsel,
            'date_of_birth' => (string)$this->date_of_birth,
            'profile_image' => (string)$this->profile_image,
            'case_details' => (string)$this->case_details,
        ];
    }
}
