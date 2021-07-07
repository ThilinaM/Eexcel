<?php

namespace App\Http\Requests;

use App\Models\BankDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBankDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bank_detail_edit');
    }

    public function rules()
    {
        return [
            'account_name' => [
                'string',
                'required',
            ],
            'account_no' => [
                'string',
                'required',
            ],
            'bank_name' => [
                'string',
                'nullable',
            ],
            'branch' => [
                'string',
                'nullable',
            ],
        ];
    }
}
