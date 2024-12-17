<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Project;
use App\Models\task;
use App\Models\User;
use App\Models\UserGroupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function listes_taches(){

        $taskAll=task::where('status','=','Terminer')->get();

        $users=User::all();
        $projetAll=Project::all();
        
        return view("admin.task.index",compact("taskAll","users","projetAll"));
    }


    public function add_taches(Request $request){
       
        $request->validate([
            'libelle'=>'required',
            'user_id'=>'required|exists:users,id',
            'project_id'=>'required|exists:projects,id',
            'date_echeances'=>'required'

            
         ],[
             'libelle.required'=>'Le nom du groupes ne peut etre vide',
             'user_id.exists'=>'L utilisateur choisis n existe plus',
             'project_id.exists'=>'Le projet choisis n existe plus',
             'user_id.required'=>'Veuillez choisr un utilisateur',
             'project_id.required'=>'Veuillez choisr un projet',
             'date_echeances.required'=>'Veuillez choisr une date d échéances',


         ]);

         $task=new task();
         $task->libelle=$request->libelle;
         $task->user_id=$request->user_id;
         $task->project_id=$request->project_id;
         $task->date_echeances=$request->date_echeances;
         $task->status="En-cours";
         $task->save();

         toastr()->info("Taches crée avec succes !");
         return back();
 
    }

    public function my_task($id){


        $groupeExist=Groupe::find($id);
        if(!$groupeExist){
            toastr()->error("Le groupe n existe plus !");
            return back();
        }
        $users=User::all();
        $projetAll=Project::all();
        $taskAll = Task::join('projects', 'projects.id', '=', 'tasks.project_id')
        ->where('projects.groupe_id', $id)
        ->where('tasks.user_id', Auth::user()->id)
        ->select('tasks.*', 'projects.libelle as project_name') 
        ->get();

        // Date d échéances
        $taskEnRetard = Task::join('projects', 'projects.id', '=', 'tasks.project_id')
        ->where('projects.groupe_id', $id)
        ->where('tasks.user_id', Auth::user()->id)
        ->where('tasks.date_echeances', '<=', date('Y-m-d')) 
        ->where('tasks.status', 'En-cours')
        ->select('tasks.*', 'projects.libelle as project_name') 
        ->count();

    
        
        return view('admin.task.my_task',compact("taskAll","users","projetAll",'taskEnRetard'));
    }


    public function my_crew(){

        $groupeAll=UserGroupe::where('user_id',Auth::user()->id)->get();
        $users=User::all();


        return view("admin.crew.my_crew",compact('groupeAll','users'));
    }



    public function list_groupes(){

        $users=User::all();
        $groupeAll=Groupe::all();
      
        return view('admin.crew.listes_groupes',compact('users','groupeAll'));
    }




    public function valide_task($id){

        $task=task::find($id);
        if(!$task){

            toastr()->error('Veuillez rafraichir la page !');
            return back();
        }

        $task->status='Terminer';
        $task->save();
        toastr()->success('Taches valider avec success !');

        return back();
    }




    public function edit_task($id){


        $task=task::find($id);
        if(!$task){
            toastr()->error("Le groupe n existe plus !");
            return back();
        }
        $users=User::all();
        $projetAll=Project::all();
        
   
        
        return view('admin.task.edit',compact("task","users","projetAll"));
    }



    
    public function upgrade_task(Request $request){
       
        $request->validate([
            'libelle'=>'required',
            'user_id'=>'required|exists:users,id',
            'project_id'=>'required|exists:projects,id',
            'date_echeances'=>'required'

            
         ],[
             'libelle.required'=>'Le nom du groupes ne peut etre vide',
             'user_id.exists'=>'L utilisateur choisis n existe plus',
             'project_id.exists'=>'Le projet choisis n existe plus',
             'user_id.required'=>'Veuillez choisr un utilisateur',
             'project_id.required'=>'Veuillez choisr un projet',
             'date_echeances.required'=>'Veuillez choisr une date d échéances',


         ]);

         $task=task::find($request->id);
         if(!$task){
             toastr()->error("Veuillez actualiser la page !");
             return back();
         }
         $task->libelle=$request->libelle;
         $task->user_id=$request->user_id;
         $task->project_id=$request->project_id;
         $task->date_echeances=$request->date_echeances;
         $task->status="En-cours";
         $task->save();

         toastr()->success("Taches modifié avec succes !");
         return back();
 
    }

}
