<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Like;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $likes = like::where('user_id', $user->id)->with('shop')->get();
        $reservations = Reservation::where('user_id', $user->id)->with('shop')->orderBy('date', 'asc')->get();

        return view('mypage', compact('likes', 'reservations', 'user'));
    }
}
