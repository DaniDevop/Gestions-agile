<!DOCTYPE html>
<html lang="en">
  @include('layout.head')

  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" />
  
  
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
              <h3 class="page-title"> Listes des projets </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Listes des projets</a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                    <button class="nav-link btn btn-success create-new-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un Groupe</button>        
                </h4>
                    </p>
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover"  id="myTable">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Désignation</th>
      <th>Date d'échéance</th>
      <th>Statut</th>
      <th>Groupe</th>
      <th>Date de création</th>
      <th>Éditer</th>
    </tr>
  </thead>
  <tbody>
    @foreach($projectAll as $project)
    <tr>
      <td> {{$project->id}} </td>
      <td>{{$project->libelle}}</td>
      <td>{{$project->date_echeance}}</td>

      <td>{{$project->status}}</td>
      <td>{{$project->groupe->libelle}}</td>
      <td>{{$project->created_at}}</td>
      <td><a href="{{route('edit.project',['id'=>$project->id])}}"><button class="btn btn-sm btn-primary">Éditer</button></a></td>
    </tr>
    @endforeach
    
  </tbody>
</table>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un groupe</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('addGroupes.project')}}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Designation</label>
    <input type="text" style="color:aliceblue" name="libelle" class="form-control" id="exampleInputEmail1"  placeholder="Designation" style="">
    @error('libelle')
            <span class="text-danger">{{ $message }}</span>
        @enderror
  </div>
    <div class="form-group">
                            <label for="exampleInputPassword4">Chef d équipe</label>
                            <select name="chef" id="" class="form-control" style="color:aliceblue">
                            @foreach($users as $user)
                                <option value="{{$user->nom}}">{{$user->nom}}</option>
                                @endforeach
                            </select>
                        </div>
    
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
   <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

  </body>
</html>