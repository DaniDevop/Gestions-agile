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
              <h3 class="page-title"> Listes des utilisateurs </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Listes des utilisateurs</a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                    <button class="nav-link btn btn-success create-new-button" >Nombres de membres {{count($usersAll)}} </button>        
                </h4>
                    </p>
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
  <thead class="thead-dark">
    <tr>
      <th>Profile</th>
      <th>Nom</th>
      <th>Email</th>
      <th>Date de création</th>
      @if(Auth::user()->role=='ADMIN')
      <th>Role</th>
      <th>Etat du compte</th>
      <th>Active/Désactive</th>
      @endif
     
    </tr>
  </thead>
  <tbody>
    @foreach($usersAll as $user)
    <tr>
      <td> 
      <img src="{{asset('storage/'.$user->profile)}}" width="100px" alt="">    
    </td>
      <td>{{$user->nom}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->created_at}}</td>
      @if(Auth::user()->role=='ADMIN')
      <td>{{$user->role}}</td>
      <td>{{$user->active ?'Active':'Desactiver'}}</td>
      <td><a href="{{route('active.or.desative.compte',['id'=>$user->id])}}" class="btn btn-info"><i class="bi bi-power"></i></a></td>

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






   @include('layout.js')
  </body>
</html>