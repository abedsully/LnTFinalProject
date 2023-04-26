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
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="icon" href="/assets/logo.png">

</head>
<body>
        <nav class="navbar px-5" style="background-color: #EDE9D5">
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
                    <a href="login" class="text-decoration-none btn btn-success">Login</a>
                @endauth
            </div>
        </nav>

        <div class="h1 d-flex justify-content-center">Shopping Cart</div>

        <div class="dropdown">
            <div class="d-flex justify-content-between mx-5">
                @php
                $a = Str::random(2);
                $b = Str::random(3);
                $invoiceNumber = strtoupper($a . '-' . $b);
              @endphp

                <h5>Invoice Number: {{ $invoiceNumber }}</h5>
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
                    <form action="" method="POST">
                        @csrf
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <table id="cart" class="table table-hover table-condensed mt-4">
            <thead>
                <tr>
                    <th style="width:29%">Product</th>
                    <th style="width:13%">Category</th>
                    <th style="width:13%">Price</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:20%" class="text-center">Subtotal</th>
                    <th style="width:12%"></th>
                </tr>
            </thead>

            <tbody>
                @php $total = 0 @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr data-id="{{ $id }}">
                            <td data-th="Product">
                                <div class="row">
                                    @if($details['image'] != NULL)
                                    <div class="col-sm-3 hidden-xs"><img src="{{ asset('/storage/Barang/') }}/{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                    @elseif($details['image'] == NULL)
                                    <div class="col-sm-3 hidden-xs"><img src="/assets/logo.png" width="100" height="100" class="img-responsive"/></div>
                                    @endif
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Category">{{ $details['category'] }}</td>
                            <td data-th="Price">${{ $details['price'] }}</td>
                            <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                            </td>
                            <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                            <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>

        </table>



        <div class="d-flex flex-column align-items-end gap-2 my-5">
                <h6>Total: ${{ $total }}</h6>
                <a href="{{ url('/dashboard') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>

        </div>

        <div class="text-left mb-5 ">
            <p>Shopping Address</p>
            <form action="/checkout" method="POST">
                @csrf

                @if(session('loginError'))

                    <div class="alert alert-danger" role="alert">
                        {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                @endif


                <div class="form-outline mb-4 col-3">
                <label class="form-label my-2" for="form2Example11">Address</label>
                  <input type="text" id="form2Example11" class="form-control @error('address') is-invalid @enderror "
                    placeholder="Enter your address" name="address"/>
                    @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-outline mb-4 col-2">
                    <label class="form-label" for="form2Example22">Post Code</label>
                  <input type="password" id="form2Example22" class="form-control @error('post_code') is-invalid @enderror" placeholder="Enter your post code" name="post_code"/>
                  @error('post_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
              </form>

        </div>


        <script type="text/javascript">

            $(".cart_update").change(function (e) {
                e.preventDefault();

                var ele = $(this);

                $.ajax({
                    url: '{{ route('update_cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function (response) {
                       window.location.reload();
                    }
                });
            });

            $(".cart_remove").click(function (e) {
                e.preventDefault();

                var ele = $(this);

                if(confirm("Do you really want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove_from_cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });

        </script>


        <footer class="copyright">
            <p>Copyright &#169; 2023 PT Meksiko</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</body>

</html>
