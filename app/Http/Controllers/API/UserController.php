<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password, [
            'rounds' => 12
        ]) ;

        $user->save();

        return response()->json([
            'status' => '200',
            'message' => "L'utilisateur enregistré avec success",
            'datas' => $user
        ]);

    }
}
