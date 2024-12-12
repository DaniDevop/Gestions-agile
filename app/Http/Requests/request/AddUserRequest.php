<?php

namespace App\Http\Requests\request;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom'=>'required',
            'email'=>'required|unique:users,email',
            'role'=>'required',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'mot_de_passe'=>'required',
            'mot_de_passe2'=>'required',
        ];
    }

    public function messages():array{

        return [
            'nom.required'=>'Le nom est requis dans le formulaire',
            'email.required'=>'L email est requis dans le formulaire',
            'email.unique'=>'L email existes déjà dans l application',
            'profile.image'=>'Le fichier doit etre une image',
            'profile.mimes'=>'Le fichier doit etre de type :jpeg,png,jpg',
            'mot_de_passe.required'=>'Le mot de passe est requis !',
            'mot_de_passe2.required'=>'Le mot de passe de confirmation  est requis !',

        ];
    }
}
