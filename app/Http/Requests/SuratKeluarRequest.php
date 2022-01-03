<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratKeluarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            // 'no_agenda'         =>'required|integer',
            'no_surat'          =>'required|string',
            'perihal'           =>'required|string|max:255',
            // 'kode'              =>'required|string',
            'tgl_surat'         =>'required|date',
            // 'keterangan'        =>'required|string|max:30',
            'file'              =>'sometimes|nullable|max:5000',
            'id_departement'    =>'required',
        ];
    }
}
