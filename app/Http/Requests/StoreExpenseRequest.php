<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'date' => ['date', 'required'],
            // accept only letters and spaces regex
            'category' => ['regex:/^[\pL\s]+$/u', 'required',  'min:3', 'max:255'],
            'title' => ['regex:/^[\pL\s]+$/u', 'required', 'min:3', 'max:255'],
            'description' => ['max:255'],
            // todo fix cost validation when i add 30 or 300
            'cost' => ['required', 'numeric', 'between:0,9999999999.99'],

            'image' => ['mimes:jpeg,png,jpg', 'max:1024']

        ];
    }
}
