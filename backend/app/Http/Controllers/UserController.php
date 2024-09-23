<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected static ?string $password;

    public function index() : AnonymousResourceCollection {
        return UserResource::collection(User::all());
    }

    public function create(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $description = $request->input('description');

        $id = User::insertGetId(
            [
                'name' => $name,
                'email' => $email,
                'email_verified_at' => now(),
                'description' => $description,
                'password' => static::$password ??= Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

        return ['answer' => 'ok', 'id' => $id];
    }
}
