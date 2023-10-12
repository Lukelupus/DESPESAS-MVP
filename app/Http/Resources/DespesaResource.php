<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DespesaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'valor' => number_format($this->valor, 2),
            'descricao' => $this->descricao,
            'data' => $this->data,
            'user' => new UserResource($this->user),
        ];
    }



}
