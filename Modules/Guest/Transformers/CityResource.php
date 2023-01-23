<?php

namespace Modules\Guest\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Guest\Entities\City;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var City|JsonResource $this */
        return [
            'uuid'  => $this->object_code,
            'title' => $this->title
        ];
    }
}
