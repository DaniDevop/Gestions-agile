<?php

namespace App\Http\Controllers;

use App\Http\Requests\request\AddUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    

    public function login(){

        return view('admin.login');
    }


    public function doLogin(Request $request)
    {
        // Validation des champs avec messages personnalisés
        $request->validate(
            [
                'identifiant' => 'required',
                'password' => 'required',
            ],
            [
                'identifiant.required' => "L'identifiant est requis !",
                'password.required' => "Le mot de passe est requis !",
            ]
        );
    
        // Vérification des informations d'identification
        if (
            !Auth::attempt(['nom' => $request->identifiant, 'password' => $request->password]) &&
            !Auth::attempt(['email' => $request->identifiant, 'password' => $request->password])
        ) {
            // Affichage d'un message d'erreur
            toastr()->error('Identifiant ou mot de passe incorrect.');
            return back()->withInput(); // Retourne à la page précédente avec les anciennes entrées
        }
    
        toastr()->success("Bienvenu ",Auth::user()->nom);
        return redirect('/admin/acceuil');
    }
    


    public function home(){

        return view('admin.index');
    }


    public function register(){


      

        return view('admin.register');
    }

    public function addAccountUser(AddUserRequest $addUserRequest){

        $user= new User();


        if($addUserRequest->mot_de_passe !=$addUserRequest->mot_de_passe2){

            toastr()->error("Les mots de passe doivent etre identique");
            return back()->withInput();
        }

        $user->nom=$addUserRequest->nom;
        $user->email=$addUserRequest->email;
        $user->role=$addUserRequest->role;

        $user->password=Hash::make($addUserRequest->mot_de_passe);
        if($addUserRequest->hasFile('profile')){
            $user->profile=$addUserRequest->file('profile')->store('user','public');
        }

        $user->save();
        toastr()->info('Compte crée avec success!');
        return back();


    }
}
