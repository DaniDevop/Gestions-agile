<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function listes_taches(){

        $taskAll=task::all();

        $users=User::all();
        $projetAll=Project::all();

        return view("admin.task.index",compact("taskAll","users","projetAll"));
    }


    public function add_taches(Request $request){

        $request->validate([
            'libelle'=>'required',
            'user_id'=>'required|exists:users,id',
            'project_id'=>'required|exists:projects,id',

            
         ],[
             'libelle.required'=>'Le nom du groupes ne peut etre vide',
             'user_id.exists'=>'L utilisateur choisis n existe plus',
             'project_id.exists'=>'Le projet choisis n existe plus',
             'user_id.required'=>'Veuillez choisr un utilisateur',
             'project_id.required'=>'Veuillez choisr un projet',

         ]);

         $task=new task();
         $task->libelle=$request->libelle;
         $task->user_id=$request->user_id;
         $task->project_id=$request->project_id;
         $task->status="En-cours";
         $task->save();

         toastr()->info("Taches crée avec succes !");
         return back();
 
    }
}
