<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    private function parseRequest(Request $request) : Request {
        if (isset($request['password'])) {
            $request['password'] = bcrypt($request['password']);
        }

        if (isset($request['dateOfBirth'])) {
            $request['dateOfBirth'] = Carbon::createFromFormat('Y.m.d', $request['dateOfBirth']);
        }

        return $request;
    }

    public function index() {
        $users = User::all();
        return $users;
    }

    public function findByID($id) : User {

        $user = User::where('id', $id)
            ->first();
        return $user;
    }

    public function save (Request $request) : JsonResponse {
        $request = $this->parseRequest($request);

        try {
            $user = User::create($request->all());
            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json("saving user failed: " . $e->getMessage(), 420);
        }
    }

    public function update (Request $request, $id) : JsonResponse {
        $request = $this->parseRequest($request);

        try {
            $user = User::where('id', $id)->first();

            if ($user != null) {
                $user->update($request->all());
            }
            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json("updating user failed: " . $e->getMessage(), 420);
        }
    }

    public function delete ($id) : JsonResponse {
        $user = User::where('id', $id)->first();
        if ($user != null) {
            $user->delete();
        }
        else {
            throw new \Exception("user with id = ' . $id . ' couldn't be deleted - it does not exist");
        }
        return response()->json('user with id = ' . $id . ' successfully deleted', 200);
    }


}
