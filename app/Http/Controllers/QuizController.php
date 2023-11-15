<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\RedirectResponse;
use illuminate\View\View;

use Illuminate\Http\Request;

class QuizController extends Controller
{
	//
	public function index(): View
	{
		$quizzes = Quiz::all();

		return view('quiz.index', compact('quizzes'));
	}

	public function create(): View
	{
		return view('quiz.create');
	}

	public function store(Request $request): RedirectResponse
	{
		$this->validate($request, [
			'difficulty' => 'required',
			'question' => 'required',
			'correct_answer' => 'required',
			'incorrect_answer1' => 'required',
			'incorrect_answer2' => 'required',
			'incorrect_answer3' => 'required',
		]);

		Quiz::create([
			'difficulty' => $request->difficulty,
			'question' => $request->question,
			'correct_answer' => $request->correct_answer,
			'incorrect_answer1' => $request->incorrect_answer1,
			'incorrect_answer2' => $request->incorrect_answer2,
			'incorrect_answer3' => $request->incorrect_answer3,
		]);

		return redirect()->route('quiz.index')->with('success', 'Quiz created successfully.');
	}

	public function show(string $id): View
	{
		$quizzes = Quiz::findOrFail($id);

		return view('quiz.show', compact('quizzes'));
	}

	public function edit(string $id): View
	{
		$quizzes = Quiz::findOrFail($id);

		return  view('quiz.edit', compact('quizzes'));
	}

	public function update(Request $request, string $id): RedirectResponse
	{
		$this->validate($request, [
			'difficulty' => 'required',
			'question' => 'required',
			'correct_answer' => 'required',
			'incorrect_answer1' => 'required',
			'incorrect_answer2' => 'required',
			'incorrect_answer3' => 'required',
		]);
		//get quiz by id
		$quizzes = Quiz::findOrFail($id);

		//update quiz
		$quizzes->update([
			'difficulty' => $request->difficulty,
			'question' => $request->question,
			'correct_answer' => $request->correct_answer,
			'incorrect_answer1' => $request->incorrect_answer1,
			'incorrect_answer2' => $request->incorrect_answer2,
			'incorrect_answer3' => $request->incorrect_answer3,
		]);
		return redirect()->route('quiz.index')->with('success', 'Quiz updated successfully.');
	}

	public function destroy(string $id): RedirectResponse
	{
		$quizzes = Quiz::findOrFail($id);
		$quizzes->delete();
		return redirect()->route('quiz.index')->with('success', 'Quiz deleted successfully.');
	}
}
