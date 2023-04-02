<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | PT Meksiko</title>
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    {{-- External CSS --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="/assets/logo.png">

</head>
<body>

    <section class="vh-200" style="background-color: #c9c9c9;">
    <nav class="navbar px-5" style="background-color: #EDE9D5">
        <div class="container-fluid">
            <a href="/"><img src="/assets/logo.png" alt="Logo" width="100" class="d-inline-block align-text-top"></a>
            <p class="my-3 h3">Welcome to PT Meksiko</p>
        </div>
    </nav>
        <div class="container h-100 mt-2 py-5 ">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-3 mx-md-4">

                      <div class="text-center">
                        <img src="/assets/logo.png" style="width: 100px;" alt="logo">
                      </div>

                      <form action="/login" method="POST">
                        @csrf
                        <p class="my-4 mb-2">Please login to your account</p>

                        @if(session('loginError'))

                            <div class="alert alert-danger" role="alert">
                                {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        @endif


                        <div class="form-outline mb-4">
                        <label class="form-label my-2" for="form2Example11">Email</label>
                          <input type="text" id="form2Example11" class="form-control @error('email') is-invalid @enderror "
                            placeholder="Enter your email address" name="email"/>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example22">Password</label>
                          <input type="password" id="form2Example22" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password"/>
                          @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>


                        <div class="text-center pt-1 mb-3 pb-1 d-flex justify-content-between">
                          <button class="btn btn-primary btn-block mb-3" type="submit">Log
                            in</button>
                        </div>

                        <div class="d-flex align-items-center justify-content-center pb-5 mb-3">
                          <p class="mb-0 me-4">Don't have an account?</p>
                          <a href="register" class="btn btn-outline-danger">Create new</a>
                        </div>

                      </form>

                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">We are more than just a company</h4>
                      <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <nav class="copyright mt-0 pt-4 d-flex justify-content-center" style="background-color: #EDE9D5;">
        <p>Copyright &#169; 2023 PT Meksiko</p>
    </nav>



</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</html>
