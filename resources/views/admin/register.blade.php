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
              <h3 class="page-title"> Ajouter un utilisateur </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">+Utilisateur</a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
             
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{route('addAccountUser.user')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label style="color:aliceblue" for="exampleInputName1">Nom</label>
                        <input type="text" class="form-control" style="color:aliceblue" name="nom" id="exampleInputName1" placeholder="Nom" value="{{old('nom')}}">
                                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label style="color:aliceblue" for="exampleInputEmail3">Email</label>
                        <input type="email" class="form-control" style="color:aliceblue" name="email" id="exampleInputEmail3" placeholder="Email" value="{{old('email')}}">
                        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
                      </div>
                      <div class="form-group">
                        <label style="color:aliceblue" for="exampleInputPassword4">Mot-de-passe</label>
                        <input type="password" class="form-control" style="color:aliceblue" name="mot_de_passe" id="exampleInputPassword4" placeholder="Mot-de-passe">
                        @error('mot_de_passe')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label style="color:aliceblue" for="exampleInputPassword4">Confirmation-Mot-de-passe</label>
                        <input type="password" style="color:aliceblue" class="form-control" name="mot_de_passe2" id="exampleInputPassword4" placeholder="Confirmation-Mot-de-passe">
                                          @error('mot_de_passe2')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label style="color:aliceblue">Profile</label>
                        <div class="input-group col-xs-12">
                          <input type="file" name="profile"  class="form-control file-upload-info"  placeholder="Télécharger">
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
                          <option style="color:aliceblue" value="ADMIN">ADMIN</option>
                          <option value="USER">USER</option>
                        </select>
                      </div>
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
   @include('layout.js')
  </body>
</html>