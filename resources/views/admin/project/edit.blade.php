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
              <h3 class="page-title"> Détails du projet </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                </ol>
              </nav>
            </div>
            <div class="row">
              
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                    <button class="nav-link btn btn-success create-new-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Modifier le projet</button>        
                </h4>
                    </p>
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Désignation</th>
      <th>Date d'échéance</th>
      <th>Statut</th>
      <th>Groupe</th>
      <th>Date de création</th>
    </tr>
  </thead>
  <tbody>
 
    <tr>
      <td> {{$project->id}} </td>
      <td>{{$project->libelle}}</td>
      <td>{{$project->date_echeance}}</td>

      <td>{{$project->status}}</td>
      <td>{{$project->groupe->libelle}}</td>
      <td>{{$project->created_at}}</td>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier le projet</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="forms-sample" action="{{route('update.project')}}" method="POST" >
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Libelle</label>
                        <input type="text" class="form-control" name="libelle" id="exampleInputName1" placeholder="Designation" value="{{$project->libelle}}">
                                        @error('libelle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Date d échéances</label>
                        <input type="date" class="form-control" name="date_echeance" id="exampleInputEmail3" placeholder="Date de fin" value="{{$project->date_echeance}}">
                        @error('date_echeance')
            <span class="text-danger">{{ $message }}</span>
        @enderror
                      </div>
                      
                     
                      <div class="form-group">
                        <div class="input-group col-xs-12">
                         
                          <span class="input-group-append">
                          </span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="En-cours">En-cours</option>
                            <option value="Finish">Terminée</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Groupes</label>
                        <select name="groupe_id" id="" class="form-control">
                        <option value="{{$project->groupe_id}}">{{$project->groupe->libelle}}</option>
                        @foreach($groupes as $groupe)
                            <option value="{{$groupe->id}}">{{$groupe->libelle}}</option>
                            @endforeach
                        </select>
                      </div>
                      <input type="hidden" name="id" value="{{$project->id}}">
                      <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
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