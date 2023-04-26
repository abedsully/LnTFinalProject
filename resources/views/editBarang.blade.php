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

    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <link rel="icon" href="/assets/logo.png">

</head>
<body>
    <nav class="navbar px-5" style="background-color: #EDE9D5">
        <div class="container-fluid">
            <a href="/"><img src="/assets/logo.png" alt="Logo" width="100" class="d-inline-block align-text-top"></a>
            <p class="my-3 h3">Welcome to PT Meksiko</p>
        </div>
    </nav>

    <h4 class="text-center mt-5">Create New Item</h4>

    <form action="{{ route('update', $barang->id )}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="d-flex flex-column align-items-center pt-3 gap-3">
            <div class="form-group col-4">
            <label for="exampleInputEmail1">Category</label>
            <input type="text" class="form-control @error('category') is-invalid @enderror " id="exampleInputPassword1" placeholder="Enter the category" name="category" value="{{ $barang->category }}" >
              @error('category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group col-4">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror " id="exampleInputPassword1" placeholder="Enter the name" name="name" value="{{ $barang->name }}" >
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group col-4">
                <label for="exampleInputPassword1">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter the price" name="price" value="{{ $barang->price }}">
                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group col-4">
                <label for="exampleInputPassword1">Stock</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter the stock" name="stock" value="{{ $barang->stock }}">
                @error('stock')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group col-4">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="exampleInputPassword1" name="image" value="{{ $barang->image }}">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mb-4">Submit</button>
        </div>
      </form>


<br><br><br><br><br>
        <nav class="copyright mt-5">
            <p>Copyright &#169; 2023 PT Meksiko</p>
        </nav>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
