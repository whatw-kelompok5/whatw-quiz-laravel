<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" price="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" price="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Edit Data Avatar</title>
</head>

<body style="background: lightgray">

  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
            <form action="{{ route('avatar.store') }}" method="POST" enctype="multipart/form-data">

              @csrf

              <div class="form-group">
                <label class="font-weight-bold">AVATAR</label>
                <input type="file" class="form-control @error('avatar_url') is-invalid @enderror" name="image">

                <!-- error message untuk avatar -->
                @error('avatar')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label class="font-weight-bold">PRICE</label>
                {{-- <input class="form-control @error('price') is-invalid @enderror" name="price" rows="5" placeholder="Masukkan Price">{{ old('price') }} --}}
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                  value="{{ old('price') }}" placeholder="Masukkan price">

                <!-- error message untuk price -->
                @error('price')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
              <button type="reset" class="btn btn-md btn-warning">RESET</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script>
    // CKEDITOR.replace( 'price' );
  </script>
</body>

</html>
