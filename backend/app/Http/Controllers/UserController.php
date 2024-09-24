<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Users\Presenters\ApiPresenter;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected static ?string $password;

    public function index() : AnonymousResourceCollection {
        return UserResource::collection(User::all());
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse {

        $error = "";
        $answer = "ok";

        $validator = Validator::make($request->all(), [
            'name' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(["answer" => json_decode($validator->errors()->toJson())]);
        }

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

        return response()->json(array_merge(["answer" => $answer, "error" => $error, "id" => $id], $request->all()));
    }
}
