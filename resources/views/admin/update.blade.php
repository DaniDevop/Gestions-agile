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
              <h3 class="page-title"> Mise à jour de mon compte </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Modifier mon mot-de-passe</a></li>

                </ol>
              </nav>
            </div>
            <div class="row">
             
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{route('update.account.user')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label style="color:aliceblue" for="exampleInputName1">Nom</label>
                        <input type="text" class="form-control" style="color:aliceblue" name="nom" id="exampleInputName1" placeholder="Nom" value="{{ $user->nom}}">
                                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label style="color:aliceblue" for="exampleInputEmail3">Email</label>
                        <input type="email" style="color:aliceblue" class="form-control" name="email" id="exampleInputEmail3" placeholder="Email" value="{{ $user->email}}">
                        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
                      </div>
                     
                      <div class="form-group">
                        <label style="color:aliceblue">Profile</label>
                        <div class="input-group col-xs-12">
                          <input type="file" name="profile" style="color:aliceblue" class="form-control file-upload-info"  placeholder="Télécharger">
                          @error('profile')
            <span class="text-danger">{{ $message }}</span>
        @enderror
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Télécharger</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label style="color:aliceblue" for="exampleInputPassword4">Role</label>
                        <select name="role" id="" class="form-control" style="color:aliceblue">
                        <option value="{{ $user->role}}">{{ $user->role}}</option>
                          <option value="ADMIN">ADMIN</option>
                          <option value="USER">USER</option>
                        </select>
                      </div>
                      <input type="hidden" name="id" value="{{ $user->id}}">
                      <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                    </form>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier mon mot de passe</h1>
      </div>
      <div class="modal-body">
      <form action="{{route('update.password')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nouveau mot de passe</label>
            <input type="password" name="password" placeholder="Nouveau mot de passe" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Confirmation du Nouveau mot de passe</label>
            <input type="password" name="password2" placeholder="Confirmation du Nouveau mot de passe" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>

        <input type="hidden" value="{{$user->id}}" name="id">
                       
                        
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