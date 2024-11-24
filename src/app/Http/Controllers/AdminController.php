<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\CreateNewUser;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Admin;

class AdminController extends Controller
{
    public function adminMypage() {
        return view('admin-mypage');
    }

    public function representativeRegister(Request $request) {
        $admin = New Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->shop_admin_status = true;
        $admin->save();

        return redirect('/admin/mypage')->with('message', '登録が完了しました');
    }

    public function shopMypage() {
        return view('shop-mypage');
    }

    public function shopCreate() {
        $genres = Genre::all();
        return view('shop-mypage_shop-create', compact('genres'));
    }

    public function storeShop(Request $request) {
        $shop = New Shop();
        $shop->admin_id = Auth::id();
        $shop->name = $request->name;
        $shop->area = $request->area;
        $shop->genre_id = $request->genre;
        $shop->content = $request->content;
        $shop->image = $request->image->store('public/shop/');
        $shop->save();

        return redirect('/shop/create')->with('message', '登録が完了しました');
    }

    public function confirmation() {
        $adminId = Auth::id();
        $today = Carbon::today();

        $reservations = Reservation::whereHas('shop', function($query) use ($adminId) {
            $query->where('admin_id', $adminId);
        })->where('date', '>=', $today)->orderBy('date', 'asc')->get();

    foreach ($reservations as $reservation) {
        $adminId = $reservation->shop->admin_id;
    }
        return view('shop-mypage_confirmation', compact('reservations'));
    }
}