<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * @return string
     */
    public function showAllUsers(): string
    {
        return response()->json(User::all());
    }

    /**
     * @param int $id
     * @return string
     */
    public function showOneUser(int $id): string
    {
        return response()->json(User::find($id));
    }

    /**
     * @param Request $request
     * @return string
     */
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

    /**
     * @param int $id
     * @param Request $request
     * @return string
     */
    public function update(int $id, Request $request): string
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


    /**
     * @param int $id
     * @return string
     */
    public function delete(int $id): string
    {
        User::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }


}
