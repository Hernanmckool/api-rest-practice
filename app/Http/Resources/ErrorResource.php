<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'errors' => [[
                'status' => $this->resource['status'],
                'code' => $this->resource['error_code'],
                'detail' => $this->resource['message'],
            ]],
            'meta' => [
                'debug' => $this->when($this->resource['debug'], function () {
                    $debug = $this->resource['debug'];
                    return [
                        'extraMessage' => $debug['extraMessage'],
                        'file' => $debug['file'],
                        'line' => $debug['line'],
                        'trace' => $debug['trace'],
                    ];
                }),
            ],
        ];
    }

}
