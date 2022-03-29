<?php

namespace App\Http\Requests;

use App\Rules\BadWordRule;
use Illuminate\Foundation\Http\FormRequest;

class DailyLogRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'log' => ['required', new BadWordRule()],
            'day' => ['required', 'date'],
        ];
    }
}
