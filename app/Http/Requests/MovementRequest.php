<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'asset_id' => 'required',
            'type' => 'required',
            'job_no' => 'required',
            'from' => 'required',
            'to' => 'required',
            'quantity' => 'required',
            'damaged' => 'required',
            'po_no' => 'required',
        ];
    }
}
