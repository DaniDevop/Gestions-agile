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
              <h3 class="page-title"> Ajouter un membrres </h3>
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
                      @if(Auth::user()->role=='ADMIN')
                    <button class="nav-link btn btn-success create-new-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un membres</button> 
                    @endif       
                </h4>

                <h4 class="card-title">
                    <button class="nav-link btn btn-info create-new-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Le chef du groupe est   : {{$groupe->chef}}</button>        
                </h4>
                    </p>
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                    <h3 class="page-title"> Listes des membres </h3>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Désignation</th>
      <th>Membres</th>
      <th>Date d'insertion</th>
      @if(Auth::user()->role=='ADMIN')
      <th>Retirer</th>
      @endif
    </tr>
  </thead>
  <tbody>
     @foreach($userGroupeAll as $userGroupe)
    <tr>
      <td> {{$userGroupe->id}} </td>
      <td>{{$userGroupe->groupe->libelle}}</td>
      <td>{{$userGroupe->user->nom}}</td>
      <td>{{$userGroupe->created_at}}</td>
      @if(Auth::user()->role=='ADMIN')
      <td><a href="{{route('delete.membre.of.groupe',['id'=>$userGroupe->id])}}"><button class="btn btn-sm btn-primary">Retirer</button></a></td>
      @endif
    </tr>
    @endforeach
   
    
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un membres</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('add.users.groupe')}}" method="POST">
        @csrf

                    <div class="form-group">
                            <label for="exampleInputPassword4">Membres</label>
                            <select name="user_id" id="" class="form-control" style="color:aliceblue;">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->nom}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="groupe_id" value="{{$groupe->id}}">
    
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