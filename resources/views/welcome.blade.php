<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Detail Data Post - SantriKoding.com</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <header>
        <h1>Selamat Datang Admin</h1>
      </header>
      <div class="col-md-12 justify-between">
        {{-- <div class="row justify-between"> --}}
        <div class="col-md-6 justify-content-lg-start">
          <a href="{{ route('quiz.index') }}" class="btn btn-md btn-primary">TAMPILKAN QUIZ</a>
        </div>
        <div class="col-md-6 justify-content-lg-end">
          <a href="{{ route('avatar.index') }}" class="btn btn-md btn-primary">TAMPILKAN AVATAR</a>
        </div>
        {{-- </div> --}}
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
