<?php


namespace App\Request;


use Illuminate\Foundation\Http\FormRequest;

class ImportValidateRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'file' => 'required|max:10000|mimes:json,xml,csv'
        ];
    }

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
