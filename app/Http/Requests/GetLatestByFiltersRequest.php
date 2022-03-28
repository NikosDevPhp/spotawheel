<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetLatestByFiltersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'startDate' => 'date_format:Y-m-d H:i:s',
            'endDate'   => 'date_format:Y-m-d H:i:s',
        ];
    }
}
