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


        <div class="container h-100 mt-4 py-3">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>

                      <form class="mx-1 mx-md-4" method="POST" action="/register">
                        @csrf

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="form3Example1c" placeholder="Input your full name" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" value="{{ old('name' )}}" autofocus/>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="form3Example3c" placeholder="Input your email" name="email" class="form-control rounded-top @error('email') is-invalid @enderror" value="{{ old('email' )}}" autofocus/>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" id="form3Example4c" placeholder="Input your password" name="password" class="form-control rounded-top @error('password') is-invalid @enderror" value="{{ old('password' )}}" autofocus/>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fa fa-phone fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="form3Example4cd" placeholder="Input your number" name="number" class="form-control rounded-top @error('number') is-invalid @enderror" value="{{ old('number' )}}" autofocus/>
                                @error('number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                          </div>
                        </div>

                        <div class="d-flex flex-column mx-0 mb-0 gap-3">
                          <button type="submit" class="btn btn-primary btn-lg">Register</button>
                          <div class="d-flex flex-row gap-5 mx-2">
                          <p>Already have an account?</p> <a href="login" class="text-decoration-none">Login</a>
                        </div>
                        </div>

                      </form>

                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center justify-content-around order-1 order-lg-2">
                      <img src="/assets/logo.png" alt="Sample image">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <nav class="copyright mt-4 pt-4 d-flex justify-content-center" style="background-color: #EDE9D5;">
            <p>Copyright &#169; 2023 PT Meksiko</p>
        </nav>
      </section>



</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</html>
