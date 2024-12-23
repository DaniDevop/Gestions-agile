<!DOCTYPE html>
<html lang="en">
    @include('layout.head')
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
       @include('layout.nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('layout.nav2')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Bienvenue  {{Auth::user()->nom}} </h4>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"></h4>
                    
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1"></h6>
                        <p class="text-muted mb-0"></p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0"></h6>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1"></h6>
                        <p class="text-muted mb-0"></p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0"></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">

                </div>

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5 style="color:aliceblue;">Utilisateur</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"> {{$userCount}} </h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium"> {{$userCount /100}} %</p>
                        </div>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5 style="color:aliceblue;">Groupes</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"></h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+{{$groupeCount/100}}%</p>
                        </div>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5 style="color:aliceblue;">Projet</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          
                          <p class="text-danger ml-2 mb-0 font-weight-medium">{{$projectCount/100}}% </p>
                        </div>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Taches non respecté</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            
                            <th> Client Name </th>
                            <th> Taches </th>
                            <th> Date-creation </th>
                            <th> Projet </th>
                            <th> Groupe </th>
                            <th> Date d'échéances </th>
                            @if(Auth::user()->role =='ADMIN')

                            <th> Valider   </th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($taskAll as $task)
                          <tr>
                            
                            <td>
                              <img src="{{asset('storage/'.$task->user->profile)}}" alt="image" />
                              <span class="pl-2">{{$task->user->nom}}</span>
                            </td>
                            <td> {{$task->libelle}} </td>
                            <td> {{$task->created_at}} </td>
                            <td>{{$task->project->libelle}} </td>
                            <td>{{$task->project->groupe->libelle}} </td>
                            <td> {{$task->date_echeances}} </td>
                            @if(Auth::user()->role =='ADMIN')
                              <td><a href="{{route('validation.task.admin',['id'=>$task->id])}}"><button class="btn badge badge-outline-success">Valider</button></a></td>

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
          <!-- partial:partials/_footer.html -->
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