<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{


    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
       // return parent::toArray($request);
        return [
            'data' => $this->collection,
            /*'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],*/
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [
                'total' => $this->total(),
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
                'per_page' => $this->perPage(),
            ],
        ];
    }
    public function withResponse($request, $response)
    {
        $response->header('X-Total-Count', $this->total());
        $response->header('X-Current-Page', $this->currentPage());
        $response->header('X-Last-Page', $this->lastPage());
        $response->header('X-Per-Page', $this->perPage());
    }
    public function withMeta($meta)
    {
        $this->additional(['meta' => $meta]);
        return $this;
    }
    public function additional($data)
    {
        $this->additional = array_merge($this->additional, $data);
        return $this;
    }
    public function toJson($options = 0)
    {
        $this->additional = array_merge($this->additional, [
            'meta' => [
                'total' => $this->total(),
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
                'per_page' => $this->perPage(),
            ],
        ]);
        return parent::toJson($options);
    }
}
