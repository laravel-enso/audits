<?php

namespace LaravelEnso\Audits\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAudit extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
