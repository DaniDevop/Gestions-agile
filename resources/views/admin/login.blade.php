<!DOCTYPE html>
<html lang="en">
  @include('layout.head')
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Page de connexion</h3>
                <form method="POST" action="{{route('doLogin.users')}}">
                  @csrf
                  <div class="form-group">
                    <label style="color:aliceblue">Identifiant</label>
                    <input type="text" style="color:aliceblue" name="identifiant" class="form-control p_input"  placeholder="Identifiant">

                    @error('identifiant')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                  </div>
                  <div class="form-group">
                    <label style="color:aliceblue">Mot de passe</label>
                    <input type="password" style="color:aliceblue" name="password" class="form-control p_input" placeholder="Mot de passe">
                    @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                  </div>
                 
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Valider</button>
                  </div>
                  
                  <p style="color:aliceblue"   class="sign-up">Mot de passe oublié ?<a href="#"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
   @include('layout.js')
  </body>
</html>