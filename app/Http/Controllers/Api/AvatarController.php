<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Avatar;
use Illuminate\Http\Request;
use App\Http\Resources\AvaResource;
use Illuminate\Support\Facades\Validator;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $avatar = Avatar::orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data Avatar Tersedia',
            'data' => $avatar
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'    => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('avatar_url');
        $image->storeAs('public/avatars', $image->hashName());

        //create post
        $avatar = Avatar::create([
            'image'     => $image->hashName(),
            'price'   => $request->price,
        ]);

        //return response
        return new AvaResource(true, 'Data Avatar Berhasil Ditambahkan!', $avatar);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $avatar = Avatar::find($id);

        return new AvaResource(true, 'Data Avatar Tersedia', $avatar);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Avatar $avatar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $avatar = Avatar::find($id);
        $avatar->delete();

        return new AvaResource(true, 'Data Avatar Berhasil Dihapus!', $avatar);
    }
}
