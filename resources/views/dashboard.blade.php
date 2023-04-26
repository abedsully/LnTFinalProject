<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | PT Meksiko</title>
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    {{-- External CSS --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>



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
                    <a class="dropdown-item px-3 mb-4" href="/create"><i class="fa fa-plus"></i> &nbsp Add Item</a>
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

            <div class="dropdown">
                <div class="d-flex justify-content-end mx-5 col-10 px-5">
                    <button type="button" class="btn btn-primary" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart &nbsp<span class="badge badge-danger">{{ count((array) session('cart')) }}</span>
                    </button>

                <div class="dropdown-menu px-1">
                    <div class="row-total-header-section">
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p>Total: <span class="text-info">$ {{$total}}</span></p>
                        </div>
                    </div>

                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    @if($details['image'] != NULL)
                                    <img src="{{ asset('/storage/Barang/') }}/{{ $details['image'] }}" style="max-width: 100px"/>
                                    @elseif($details['image'] == NULL)
                                    <img src="/assets/logo.png" alt="" style="max-width: 100px;">
                                    @endif
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">

                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    @endif

                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="/cart" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>

                </div>
            </div>


            @if(session('success'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-success px-5 mt-1">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            @else

            @endif





        <div class="d-flex align-items-center flex-column gap-4 flex-wrap mt-4">
        @foreach($barangs as $barang)
            <div class="card d-flex" style="width: 17rem">
                @if($barang->image != NULL)
                    <div class="d-flex justify-content-center mt-2">
                    <img src="{{asset( '/storage/Barang/' .$barang->image )}}" class="card-img-top" alt="" style="max-width: 200px; height: 140px">
                </div>
                @elseif($barang->image == NULL)
                    <div class="d-flex justify-content-center">
                <img src="/assets/logo.png" alt="" style="max-width: 200px; height: 150px">
            </div>
                @endif
                <div class="card-body" style="width: 270px">
                    <h6 class="card-title text-center">Category: {{ $barang->category }}</h6>
                    <hr>
                    <p class="card-text">Name: {{ $barang->name }}</p>
                    <p class="card-text">Price: Rp {{ $barang->price }}</p>
                    <p class="card-text">Stock: {{ $barang->stock }}</p>
                    <div class="d-flex justify-content-around">
                        @can('isAdmin')
                        <a href="{{ route('edit', $barang->id )}}" class="btn btn-success">Edit</a>

                        <form action="{{ route('delete', $barang->id )}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</a>
                        </form>
                        @else

                        @if($barang['stock'] == 0)
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-secondary">Out of Stock</button>
                            </div>
                        @elseif($barang['stock'] != 0)
                        <div class="d-flex justify-content-center">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('add_to_cart', $barang->id) }}" class="btn btn-primary" role="button">Add to Cart</a>
                            </div>
                        </div>
                        @endif

                        @endcan
                    </div>
                </div>
            </div>
            <br>
        @endforeach

    </div>



        <footer class="copyright d-flex justify-content-center">
            <p class>Copyright &#169; 2023 PT Meksiko</p>
        </footer>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</body>

</html>
