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
                    <form class="forms-sample" action="{{route('create.project')}}" method="POST" >
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Libelle</label>
                        <input type="text" class="form-control" name="libelle" id="exampleInputName1" placeholder="Designation" value="{{old('libelle')}}">
                                        @error('libelle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Date d échéances</label>
                        <input type="date" class="form-control" name="date_echeance" id="exampleInputEmail3" placeholder="Date de fin" value="{{old('date_echeance')}}">
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
                        <label for="exampleInputPassword4">Groupes</label>
                        <select name="groupe_id" id="" class="form-control">
                        @foreach($groupes as $groupe)
                            <option value="{{$groupe->id}}">{{$groupe->libelle}}</option>
                            @endforeach
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