<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(UserRequest $request)
    {
        $user = User::where('emailaddress', $request->emailaddress)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'emailaddress' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        $response = [
            'user'  =>  $user,
            'token' =>  $user->createToken($request->emailaddress)->plainTextToken
        ];
     
        return $response;
    }
    public function register(UserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return $user;
    }

    public function userdetails($id)
    {
        $user = User::where('id', $id)->get();
        return $user;
    }
    public function update(UserRequest $request, string $id)
    {
        $validated = $request->validated();

        $user = User::findOrFail($id);

        $user-> update($validated);
                    

        return $user;
    }

}
