<!DOCTYPE html>
<html lang="en">
  @include('layout.head')
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      @include('layout.nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        @include('layout.nav2')

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Details de la  taches </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Détails de la taches</a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                    @if(Auth::user()->role =='ADMIN')

                    <button class="nav-link btn btn-success create-new-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Modifier la taches</button>
                    @endif

                    
      
                </h4>
                    </p>
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Désignation</th>
      <th>Utilisateur</th>
      <th>Project</th>
      <th>Status</th>
      <th>Date d'écheances</th>
     
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <td> {{$task->id}} </td>
      <td>{{$task->libelle}}</td>
      <td>{{$task->user->nom}}</td>
      <td>{{$task->project->libelle}}</td>
      <td>{{$task->status}}</td>
      <td>{{$task->date_echeances}}</td>
      
    </tr>
   
    
  </tbody>
</table>

                    </div>
                  </div>
                </div>
              </div>
            
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier la tache</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('upgrade.task')}}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Designation</label>
    <input type="text" name="libelle" class="form-control" id="exampleInputEmail1" value="{{$task->libelle}}" aria-describedby="emailHelp">
    @error('libelle')
            <span class="text-danger">{{ $message }}</span>
        @enderror
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Date d 'échéances</label>
    <input type="date" name="date_echeances" class="form-control" id="exampleInputEmail1" value="{{$task->date_echeances}}" aria-describedby="emailHelp">
    @error('libelle')
            <span class="text-danger">{{ $message }}</span>
        @enderror
  </div>
                    <div class="form-group">
                            <label for="exampleInputPassword4">Utilisateur</label>
                            <select name="user_id" id="" class="form-control">
                            <option value="{{$task->user_id}}">{{$task->user->nom}}</option>

                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->nom}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="exampleInputPassword4">Projet</label>
                            <select name="project_id" id="" class="form-control">
                            <option value="{{$task->project_id}}">{{$task->project->libelle}}</option>
                            @foreach($projetAll as $projet)
                                <option value="{{$projet->id}}">{{$projet->libelle}}</option>
                                @endforeach
                            </select>

                            @error('project_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
                        </div>

                        <input type="hidden" name="id" value="{{$task->id}}">
    
  <button type="submit" class="btn btn-primary">Valider</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
   @include('layout.js')
  </body>
</html>