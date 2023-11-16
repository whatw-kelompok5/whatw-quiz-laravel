<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class AvatarController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): View
	{
		//
		$avatar = Avatar::all();

		//render view with avatars
		return view('avatar.index', compact('avatar'));
	}

	/**
	 * Store a newly created resource in storage.
	 */

	public function create(): View
	{
		return view("avatar.create");
	}

	public function store(Request $request): RedirectResponse
	{
		//

		$this->validate($request, [
			'image'   => 'required|image|mimes::jpeg,jpg,png|max:5000',
			'price'        => 'required',
		]);

		// $image = $request->file('avatar_url');
		// $image->storeAs('public/avatars', $image->hashName());

		$image = cloudinary()->upload($request->file('image')->getRealPath(), ["folder" => "whatw-quiz"])->getSecurePath();

		Avatar::create([
			'image'   => $image,
			'price'        => $request->price,
		]);

		return redirect()->route("avatar.index")->with(["success" => "Avatar berhasil dibuat"]);
	}

	/**
	 * Display the specified resource.
	 */
	public function show($id)
	{
		//
		$avatar = Avatar::find($id);
		return view("avatar.show", compact("avatar"));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id): View
	{
		//
		$avatar = Avatar::find($id);
		return view("avatar.edit", compact("avatar"));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, $id)
	{
		//
		//validate form
		$this->validate($request, [
			'image'    => 'image|mimes:jpeg,jpg,png|max:5000',
			'price'         => 'required'
		]);

		//get avatar by ID
		$avatar = Avatar::findOrFail($id);

		// check if image is uploaded
		if ($request->hasFile('image')) {

			//upload new image
			$image = cloudinary()->upload($request->file('image')->getRealPath(), ["folder" => "whatw-quiz"])->getSecurePath();

			//delete old image

			//update avatar with new image
			$avatar->update([
				'image'   => $image,
				'price'        => $request->price
			]);
		} else {
			//update avatar without image
			$avatar->update([
				'price'         => $request->price
			]);
		}
		//redirect to index
		return redirect()->route('avatar.index')->with(['success' => 'Avatar Berhasil Diubah!']);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id): RedirectResponse
	{
		//
		$avatar = Avatar::findorfail($id);
		$avatar->delete();

		return redirect()->route("avatar.index")->with(["success" => "Avatar Berhasil Dihapus"]);
	}
}
