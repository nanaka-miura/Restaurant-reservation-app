<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $userId = Auth::id();
        $like = Like::where('user_id', $userId)->pluck('shop_id')->toArray();
        return view('shop-list', compact('shops', 'like'));
    }

    public function search(Request $request)
    {
        $shops = Shop::AreaSearch($request->area)->GenreSearch($request->genre)->KeywordSearch($request->keyword)->get();
        $userId = Auth::id();
        $like = Like::where('user_id', $userId)->pluck('shop_id')->toArray();

        return view('shop-list', compact('shops', 'like'));
    }

    public function like(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);
        $userId = Auth::id();

        $like = $shop->likes()->where('user_id', $userId)->first();

        if ($like) {
            $like->delete();
        } else {
            $shop->likes()->create(['user_id' => $userId, 'shop_id' => $id]);
        }

        return redirect('/');
    }

    public function detail($id)
    {
        $shop = Shop::findOrFail($id);
        $previous = Shop::where('id', '<', $shop->id)->orderBy('id', 'desc')->first();
        $next = Shop::where('id', '>', $shop->id)->orderBy('id')->first();

        return view('shop-detail', compact('shop', 'previous', 'next'));
    }

    public function reservation(Request $request, $id)
    {
        $reservation = New Reservation();
        $reservation->user_id = Auth::user()->id;
        $reservation->shop_id = $id;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->number = $request->number;
        $reservation->save();

        return redirect('/');
    }

    public function cancel(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->delete();

        return redirect('/mypage');
    }
}
