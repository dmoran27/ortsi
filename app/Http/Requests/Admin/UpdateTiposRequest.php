<?php
namespace App\Http\Requests\Admin;

use App\Tipo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTiposRequest extends FormRequest
{
    /**
     * Determine if the Tipo is authorized to make this request.
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
        return Tipo::updateValidation($this);
    }
}
