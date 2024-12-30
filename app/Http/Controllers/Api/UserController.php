<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function me(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }

    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);

        $data['password'] = Hash::make($data['password']);

        /**
         * @var User $user
         */
        $user = User::query()->create($data);

        return response()->json([
            'token' => $user->createToken('api')->plainTextToken
        ]);
    }

    public function login(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        /**
         * @var User $user
         */
        $user = User::query()
            ->where('email', $data['email'])
            ->firstOrFail();

        if (!Hash::check($data['password'], $user->getAuthPassword())) {
            abort(403);
        }

        $user->tokens()->delete();

        return response()->json([
            'token' => $user->createToken('api')->plainTextToken,
        ]);
    }


    public function books(Request $request)
    {
        return Book::query()
            ->paginate(3);
    }
}
