<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
            <a href="{{ route('avatar.create') }}" class="btn btn-md btn-success mb-3">TAMBAH AVATAR</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">AVATAR</th>
                  <th scope="col">PRICE</th>
                  <th scope="col">ACTION</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($avatar as $avatar)
                  <tr>
                    <td class="text-center">
                      <img src="{{ $avatar->image }}" class="rounded" style="width: 150px">
                    </td>
                    <td>{!! $avatar->price !!}</td>
                    <td class="text-center">
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('avatar.destroy', $avatar->id) }}" method="POST">
                        <a href="{{ route('avatar.show', $avatar->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                        <a href="{{ route('avatar.edit', $avatar->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <div class="alert alert-danger">
                    Data Post belum Tersedia.
                  </div>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    //message with toastr
    @if (session()->has('success'))

      toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (session()->has('error'))

      toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
  </script>

</body>

</html>
