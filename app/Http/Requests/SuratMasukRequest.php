<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratMasukRequest extends FormRequest
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
            // 'no_agenda'         =>'required|integer',
            'no_surat'          =>'required|string',
            'perihal'           =>'required|string|max:255',
            // 'kode'              =>'required|string',
            'tgl_surat'         =>'required|date',
            'tgl_diterima'      =>'required|date',
            // 'keterangan'        =>'required|string|max:30',
            'file'              =>'sometimes|nullable|max:5000',
            'id_departement'    =>'required',
        ];
    }
}
