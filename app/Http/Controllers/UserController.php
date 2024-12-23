<?php

namespace App\Http\Controllers;

use App\Http\Requests\request\AddUserRequest;
use App\Models\task;
use App\Models\User;
use App\Models\Groupe;
use App\Models\Project;

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


        $taskAll = task::join('projects', 'projects.id', '=', 'tasks.project_id')
        ->where('tasks.user_id', Auth::user()->id)
        ->where('tasks.date_echeances', '<=', date('Y-m-d')) 
        ->where('tasks.status', 'En-cours')
        ->select('tasks.*', 'projects.libelle as project_name') 
        ->get();
        $userCount=User::count();
        $groupeCount=Groupe::count();
        $projectCount=Project::count();

        return view('admin.index',compact('taskAll','userCount','groupeCount','projectCount'));
    }


    public function listes_users(){

        $usersAll=User::all();

        return view('admin.users',compact('usersAll'));
    }


    public function update_account($id){


        $user=User::find($id);
        if(!$user){

            toastr()->error('Veuillez actualiser la page');
            return back();
        }

        return view('admin.update',compact('user'));


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
        $user->active=false;

        $user->password=Hash::make($addUserRequest->mot_de_passe);
        if($addUserRequest->hasFile('profile')){
            $user->profile=$addUserRequest->file('profile')->store('user','public');
        }

        $user->save();
        toastr()->info('Compte crée avec success!');
        return back();


    }



    public function update_account_user(Request $request){


        $request->validate([
            'nom'=>'required',
            'email'=>'required|email',
            'role'=>'required',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',

        ],[
            'nom.required'=>'Le nom est requis dans le formulaire',
            'email.required'=>'L email est requis dans le formulaire',
            'role.required'=>'Le role est requis',
            'email.email'=>'L email doit etre de type Ex : example@gmail.com',
            'profile.image'=>'Le fichier doit etre une image',
            'profile.mimes'=>'Le fichier doit etre de type :jpeg,png,jpg',
        ]);
        $user=User::find($request->id);

        if(!$user){

            toastr()->error("Veuillez actualiser la page");
            return back();
        }

        $user->nom=$request->nom;
        $user->email=$request->email;
        $user->role=$request->role;

        if($request->hasFile('profile')){
            $user->profile=$request->file('profile')->store('user','public');
        }

        $user->touch();
        toastr()->info('Compte crée avec success!');
        return back();
    }


    public function update_password(Request $request){

        $request->validate([
            'password'=>'required|min:4',
            'password2'=>'required|min:4',


        ],[
            'password.required'=>'Le mot de passe est requis dans le formulaire',
            'password2.required'=>'Le mot de passe est requis dans le formulaire',
            'password.min'=>'Le mot de passe doit aumoins avoir 4 caractère',
            'password2.min'=>'Le mot de passe doit aumoins avoir 4 caractère',

        ]);


         if($request->password !=$request->password2){

            toastr()->error("Les mots de passe doivent etre identique");
            return back()->withInput();
        }

        $user=User::find($request->id);
        if(!$user){

            toastr()->error("Veuillez actualiser la page");
            return back();
        }

        $user->password=Hash::make($request->password);
        $user->touch();

        toastr()->info("Votre mot de passe à été modifié");
            return back();      
    }


    public function active_or_desative_compte($id){

        $user=User::find($id);
        if(!$user){
            toastr()->warning('Veuillez rafraichir la page');
            return back();
        }
        $user->active ?$user->active=false :$user->active=true;
        $user->save();
        

        toastr()->info('Opération éffectué avec success !🎉🎉');
        return back();
    }

    public function logout(){

        Auth::logout();

        return view('admin.login');
    }
}
