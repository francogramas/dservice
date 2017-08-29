<?php

namespace Dservices\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;


class updateContratistasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    public function __construct(Route $route)
    {
        $this->route=$route;
    }

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
            'codigo'=>'required|min:3|unique:contratistas'->ignore($this->codigo),
            'nombre'=>'required|min:3',
            'ciudades_id'=>'required|not_in:0',
            'telefono'=>'required|not_in:0',
            'correo'=>'required|not_in:0',
        ];
    }
}
