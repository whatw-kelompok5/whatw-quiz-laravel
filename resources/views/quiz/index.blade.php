<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data quiz</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">
  @include('welcome')
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div>
          <h3 class="text-center my-4">Data Question</h3>
          <h5 class="text-center">What Happen Around The World</h5>
          <hr>
        </div>
        <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
            <a href="{{ route('quiz.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">DIFFICULTY</th>
                  <th scope="col">QUESTION</th>
                  <th scope="col">ANSWER</th>
                  <th scope="col">!ANSWER 1</th>
                  <th scope="col">!ANSWER 2</th>
                  <th scope="col">!ANSWER 3</th>
                  <th scope="col" class="text-center">ACTION ?!!</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($quizzes as $quiz)
                  <tr>
                    <td>{{ $quiz->difficulty }}</td>
                    <td>{{ $quiz->question }}</td>
                    <td>{{ $quiz->correct_answer }}</td>
                    <td>{{ $quiz->incorrect_answer1 }}</td>
                    <td>{{ $quiz->incorrect_answer2 }}</td>
                    <td>{{ $quiz->incorrect_answer3 }}</td>
                    <td class="text-center">
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('quiz.destroy', $quiz->id) }}" method="POST">
                        <div class="btn-group">
                          <a href="{{ route('quiz.show', $quiz->id) }}" class="btn btn-dark btn-sm">SHOW</a>
                          <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn btn-warning btn-sm">EDIT</a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">HAPUS</button>
                        </div>
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
            {{-- {{ $quiz->links() }} --}}
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
