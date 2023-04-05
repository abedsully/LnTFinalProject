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
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <link rel="icon" href="/assets/logo.png">

</head>
<body>
        <nav class="navbar px-5" style="z-index: 1; background-color: #EDE9D5; display:block; top: 0; position: sticky;">
            <div class="container-fluid">
                <a href="/dashboard"><img src="/assets/logo.png" alt="Logo" width="100" height="80" class="d-inline-block align-text-top"></a>
                @auth()
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome Back, {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="fa fa-arrow-right"></i> &nbsp Logout</button>
                      </form>
                    </div>
                </div>
                @else
                    <a href="login" class="text-decoration-none btn btn-secondary">Login</a>
                @endauth
            </div>
        </nav>

        <nav id="sidebarMenu" class="sidebar bg-white">
            <div class="position-sticky">
              <div class="list-group list-group-flush mx-0 mt-5 pt-2">


                    @can('isAdmin')
                    <h4 class="text-center">Admin Dashboard<hr></h4>
                    <div class="sidebar-a">
                    <a class="dropdown-item px-3 mb-4" href="/"><i class="fa fa-home"></i> &nbsp Home</a>
                    <a class="dropdown-item px-3" href="/create"><i class="fa fa-plus"></i> &nbsp Add Item</a>
                    @else

                    <h4 class="text-center">User Dashboard<hr></h4>
                    <div class="sidebar-a">
                    <a class="dropdown-item px-3 mb-4" href="/"><i class="fa fa-home"></i> &nbsp Home</a>
                    @endcan

                </div>

              </div>
            </div>
          </nav>

        <h3 class="text-center mt-5">List Items</h3>

        <div class="d-flex justify-content-center">
            <div class="col-md-3">
                <form action="/dashboard" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="search" aria-describedby="button-addon2">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </div>
                </form>
            </div>
        </div>

        <h5 class="text-end text-danger" style="margin-right: 7.5rem; margin-bottom: 3rem"><i class="fa fa-shopping-cart"></i></h5>



        <div class="d-flex align-items-center flex-row gap-4 flex-wrap mt-2" style="padding-left: 23rem">
        @foreach($barangs as $barang)
            <div class="card d-flex" style="width: 17rem">
                @if($barang->image != NULL)
                    <div class="d-flex justify-content-center">
                    <img src="{{asset( '/storage/Barang/' .$barang->image )}}" class="card-img-top" alt="" style="max-width: 200px; height: 140px">
                </div>
                @elseif($barang->image == NULL)
                    <div class="d-flex justify-content-center">
                <img src="/assets/image-cart.jpeg" alt="" style="max-width: 200px; height: 140px">
            </div>
                @endif
                <div class="card-body" style="width: 270px">
                    <h6 class="card-title text-center">Category: {{ $barang->category }}</h6>
                    <hr>
                    <p class="card-text">Name: {{ $barang->name }}</p>
                    <p class="card-text">Price: Rp {{ $barang->price }}</p>
                    <p class="card-text">Amount: {{ $barang->amount }}</p>
                    <div class="d-flex justify-content-center gap-4">
                        <form action="#" method="POST" class="d-flex gap-4">
                            @csrf
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                            <input type="number" name="number" min="1" max="10" class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                            style="width: 50px"/>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
    </div>



        <nav class="copyright d-flex justify-content-center">
            <p class>Copyright &#169; 2023 PT Meksiko</p>
        </nav>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
