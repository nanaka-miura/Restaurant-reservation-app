<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $creator = new CreateNewUser();
        $user = $creator->create($request->all());

        event(new Registered($user));

        return view('/thanks');
    }
}
