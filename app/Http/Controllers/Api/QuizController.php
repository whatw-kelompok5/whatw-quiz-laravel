<?php

namespace App\Http\Controllers\Api;

use App\Models\Quiz;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//import resource quizresource
use App\Http\Resources\QuizResource;

use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
	//

	public function index()
	{
		$quiz = Quiz::all();

		return new QuizResource(true, 'List Data Quiz', $quiz);
	}

	public function store(Request $request)
	{
		//define validation rules
		$validator = Validator::make($request->all(), [
			'difficulty'     => 'required',
			'question'     => 'required',
			'correct_answer'   => 'required',
			'incorrect_answer1'   => 'required',
			'incorrect_answer2'   => 'required',
			'incorrect_answer3'   => 'required',
		]);

		//check if validation fails
		if ($validator->fails()) {
			return response()->json($validator->errors(), 422);
		}


		//create quiz
		$quiz = Quiz::create([
			'difficulty'     => $request->difficulty,
			'question'   => $request->question,
			'correct_answer'   => $request->correct_answer,
			'incorrect_answer1'   => $request->incorrect_answer1,
			'incorrect_answer2'   => $request->incorrect_answer2,
			'incorrect_answer3'   => $request->incorrect_answer3,
		]);

		//return response
		return new QuizResource(true, 'Data Post Berhasil Ditambahkan!', $quiz);
	}

	public function show($id)
	{
		//find quiz by ID
		$quiz = Quiz::find($id);

		//return single quiz as a resource
		return new QuizResource(true, 'Detail Data Post!', $quiz);
	}

	public function update(Request $request, $id)
	{
		//define validation rules
		$validator = Validator::make($request->all(), [
			'difficulty'     => 'required',
			'question'     => 'required',
			'correct_answer'   => 'required',
			'incorrect_answer1'   => 'required',
			'incorrect_answer2'   => 'required',
			'incorrect_answer3'   => 'required',
		]);

		//check if validation fails
		if ($validator->fails()) {
			return response()->json($validator->errors(), 422);
		}

		//find quiz by ID
		$quiz = Quiz::find($id);


		//update quiz without image
		$quiz->update([
			'difficulty'     => $request->difficulty,
			'question'   => $request->question,
			'correct_answer'   => $request->correct_answer,
			'incorrect_answer1'   => $request->incorrect_answer1,
			'incorrect_answer2'   => $request->incorrect_answer2,
			'incorrect_answer3'   => $request->incorrect_answer3,
		]);

		//return response
		return new QuizResource(true, 'Data Quiz Berhasil Diubah!', $quiz);
	}
	public function destroy($id)
	{

		//find quiz by ID
		$quiz = Quiz::find($id);


		//delete quiz
		$quiz->delete(); 

		//return response
		return new QuizResource(true, 'Data Quiz Berhasil Dihapus!', null);
	}
}
