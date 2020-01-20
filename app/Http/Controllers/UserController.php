<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function showAllUsers(): string
    {
        return response()->json(User::all());
    }

    public function showOneUser($id): string
    {
        return response()->json(User::find($id));
    }

    public function create(Request $request): string
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'location' => 'required|alpha'
        ]);
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update($id, Request $request): string
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'location' => 'required|alpha'
        ]);
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete($id): string
    {
        User::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }


}
