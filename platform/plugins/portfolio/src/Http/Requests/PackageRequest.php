<?php

namespace Botble\Portfolio\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Portfolio\Enums\PackageDuration;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class PackageRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'description' => ['nullable', 'string', 'max:400'],
            'content' => ['nullable', 'string'],
            'duration' => ['required', 'string', Rule::in(PackageDuration::values())],
            'price' => ['required', 'string', 'min:0', 'max:50'],
            'annual_price' => ['nullable', 'string', 'min:0', 'max:50'],
            'features' => ['required', 'string', 'max:4000'],
            'status' => ['required', 'string', Rule::in(BaseStatusEnum::values())],
            'is_popular' => ['nullable', 'boolean'],
        ];
    }
}
