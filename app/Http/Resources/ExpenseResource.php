<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],
            'category' => $this->category,
            'description' => $this->description,
            'value' => 'R$ ' .number_format($this->value, 2, ',', '.'),
            'date_spent' => $this->date_spent,
        ];
    }
}