<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tambah Data Post - SantriKoding.com</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
            <form action="{{ route('quiz.store') }}" method="POST" enctype="multipart/form-data">

              @csrf

              {{-- <div class="form-group">
                <label class="font-weight-bold">GAMBAR</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                <!-- error message untuk title -->
                @error('image')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div> --}}

              <div class="form-group">
                <label class="font-weight-bold">QESTION</label>
                <input type="text" class="form-control @error('question') is-invalid @enderror" name="question"
                  value="{{ old('question') }}" placeholder="Insert the Question">
                <input type="text" class="form-control @error('difficulty') is-invalid @enderror mt-2 w-25"
                  name="difficulty" value="{{ old('question') }}" placeholder="Difficulty">

                <!-- error message untuk question -->
                @error('question,difficulty')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label class="font-weight-bold">CORRECT ANSWER</label>
                <input type="text" class="form-control @error('correct_answer') is-invalid @enderror"
                  name="correct_answer" value="{{ old('correct_answer') }}" placeholder="Insert the Correct Answer">


                <!-- error message untuk title -->
                @error('correct_answer')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              {{-- <div class="form-group">
                <label class="font-weight-bold">INCORRECT ANSWER</label>
                <input type="text" class="form-control @error('incorrect_answer1') is-invalid @enderror"
                  name="incorrect_answer1" value="{{ old('incorrect_answer1') }}"
                  placeholder="Insert the !Correct Answer">
                <input type="text" class="form-control @error('incorrect_answer2') is-invalid @enderror"
                  name="incorrect_answer2" value="{{ old('incorrect_answer2') }}"
                  placeholder="Insert the !Correct Answer">
                <input type="text" class="form-control @error('incorrect_answer3') is-invalid @enderror"
                  name="incorrect_answer3" value="{{ old('incorrect_answer3') }}"
                  placeholder="Insert the !Correct Answer">


                <!-- error message untuk title -->
                @error('incorrect_answer1, incorrect_answer2, incorrect_answer3')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div> --}}
              <div class="form-group">
                <label class="font-weight-bold">INCORRECT ANSWER</label>

                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control @error('incorrect_answer1') is-invalid @enderror"
                      name="incorrect_answer1" value="{{ old('incorrect_answer1') }}"
                      placeholder="Insert the !Correct Answer 1">
                  </div>

                  <div class="col-md-6">
                    <input type="text" class="form-control @error('incorrect_answer2') is-invalid @enderror"
                      name="incorrect_answer2" value="{{ old('incorrect_answer2') }}"
                      placeholder="Insert the !Correct Answer 2">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mt-2">
                    <input type="text" class="form-control @error('incorrect_answer3') is-invalid @enderror"
                      name="incorrect_answer3" value="{{ old('incorrect_answer3') }}"
                      placeholder="Insert the !Correct Answer 3">
                  </div>
                </div>

                <!-- error message untuk incorrect_answer -->
                @error('incorrect_answer1, incorrect_answer2, incorrect_answer3')
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
</body>
