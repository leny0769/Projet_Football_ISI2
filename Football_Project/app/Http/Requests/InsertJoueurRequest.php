<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertJoueurRequest extends FormRequest
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
            "Prénom" => ['required', 'string', 'max:30'],
            "Nom" => ['required', 'string', 'max:30'],
            "Poste" => ['required', 'string', 'max:1'],
            "PiedFort" => ['required', 'string', 'max:1'],
            "Taille" => ['required', 'numeric', 'min:100', 'max:250'],
            "Poids" => ['required', 'numeric', 'min:40', 'max:150'],
            "VilleNaissance" => ['required', 'string', 'max:50'],
            "Nationalité" => ['required', 'string', 'max:30'],
            "PhotoURL" => ['required', 'active_url', 'max:500'],
            "TypeJoueur" => ['required', 'string', 'max:1'],
            "Numéro" => ['nullable', 'numeric', 'min:1', 'max:99'],
        ];
    }
}
