<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::latest()->get();
        // return $users;

        return UserResource::collection(User::all());
    }

    public function show(User $user){
        return UserResource::make($user);
    }

    public function store(StoreUserRequest $request){
        $user= User::create($request->validated());
        return UserResource::make($user);
    }

}
