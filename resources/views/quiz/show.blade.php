<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Detail Data Quiz</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
            {{-- <img src="{{ asset('storage/posts/' . $quizzes->image) }}" class="w-100 rounded"> --}}
            <h4>{{ $quizzes->question }}</h4>
            difficulty : <strong>{{ $quizzes->difficulty }}</strong>
            <hr>
            <p class="tmt-3">
              correct answer : <strong>{{ $quizzes->correct_answer }}</strong>
            </p>
            <p class="tmt-3">
              incorrect answer :
            </p>
            <strong>{{ $quizzes->incorrect_answer1 }},</strong>
            <strong>{{ $quizzes->incorrect_answer2 }},</strong>
            <strong>{{ $quizzes->incorrect_answer3 }}</strong>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
