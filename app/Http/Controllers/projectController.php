<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class projectController extends Controller
{
    


    public function list_project(){



        $users=User::all();
        $projectAll=Project::all();

        return view('admin.project.index',compact('users','projectAll'));
    }


    public function list_groupes(){

        $users=User::all();
        $groupeAll=Groupe::all();
      

        return view('admin.crew.index',compact('users','groupeAll'));
    }


    public function addProject(){

        $groupes=Groupe::all();

        return view("admin.project.create",compact('groupes'));
    }



    public function addGroupes(Request $request){

        $request->validate([
           'libelle'=>'required|unique:groupes,libelle',
           'chef'=>'required'
        ],[
            'libelle.required'=>'Le nom du groupes ne peut etre vide',
            'libelle.unique'=>'Un groupe portant ce nom existe déjà'
        ]);


        $groupe=new Groupe();
        $groupe->libelle=$request->libelle;
        $groupe->chef=$request->chef;
        $groupe->save();

        toastr()->info('Groupe ajouté avec success ');
        return back();


    }


    public function create_project(Request $request){

        $request->validate([
            'libelle'=>'required|unique:projects,libelle',
            'date_echeance'=>'required',
            'groupe_id'=>'required|exists:groupes,id',

         ],[
             'libelle.required'=>'Le nom du groupes ne peut etre vide',
             'libelle.unique'=>'Le project portant ce nom existe déjà',
             'date_echeance.required'=>'La date d échéances est requis',
             'groupe_id.exists'=>'Le groupe n existe plus'

         ]);

         $project=new Project();
         $project->libelle=$request->libelle;
         $project->date_echeance=$request->date_echeance;
         $project->date_echeance=$request->date_echeance;
         $project->groupe_id=$request->groupe_id;
         $project->status="En-cours";
         $project->save();
         toastr()->info("Projet crée avec success !");
         return back();


    }


    public function edit_project($id){
        $project=Project::find($id);
        if(!$project){

            toastr()->error('Veuillez actualiser la page');
            return back();
        }
        $groupes=Groupe::all();


        return view("admin.project.edit",compact('project','groupes'));
    }


    public function update_project(Request $request){

        $request->validate([
            'libelle'=>'required',
            'date_echeance'=>'required',
            'groupe_id'=>'required|exists:groupes,id',

         ],[
             'libelle.required'=>'Le nom du groupes ne peut etre vide',
             'date_echeance.required'=>'La date d échéances est requis',
             'groupe_id.exists'=>'Le groupe n existe plus'

         ]);

         $project= Project::find($request->id);
         if(!$project){

            toastr()->error('Veuillez actualiser la page');
            return back();
        }
         $project->libelle=$request->libelle;
         $project->date_echeance=$request->date_echeance;
         $project->date_echeance=$request->date_echeance;
         $project->groupe_id=$request->groupe_id;
         $project->status=$request->status;
         $project->touch();
         toastr()->success("Projet modifié avec success  !");
         return back();


    }

    public function edit_groupe($id){

        $groupe=Groupe::find($id);
        if(!$groupe){

            toastr()->error('Veuillez actualiser la page');
            return back();
        }
        $users=User::all();
        return view("admin.crew.edit",compact('users','groupe'));
    }



    public function updateGroupes(Request $request){

        $request->validate([
           'libelle'=>'required',
           'chef'=>'required',
           
        ],[
            'libelle.required'=>'Le nom du groupes ne peut etre vide',
            'libelle.unique'=>'Un groupe portant ce nom existe déjà'
        ]);


        $groupe=Groupe::find($request->id);
        if(!$groupe){

            toastr()->error('Veuillez actualiser la page');
            return back();
        }
        $groupe->libelle=$request->libelle;
        $groupe->chef=$request->chef;
        $groupe->save();

        toastr()->success('Groupe mise à jour avec success ');
        return back();


    }


    
}