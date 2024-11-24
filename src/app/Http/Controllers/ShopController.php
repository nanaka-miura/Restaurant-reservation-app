<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use App\Models\Reservation;
use App\Models\Rating;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\RatingRequest;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::with('genre')->get();
        $userId = Auth::id();
        $genres = Genre::all();
        $like = Like::where('user_id', $userId)->pluck('shop_id')->toArray();

        return view('shop-list', compact('shops', 'like', 'genres'));
    }

    public function search(Request $request)
    {
        $shops = Shop::AreaSearch($request->area)->GenreSearch($request->genre)->KeywordSearch($request->keyword)->get();
        $userId = Auth::id();
        $like = Like::where('user_id', $userId)->pluck('shop_id')->toArray();
        $genres = Genre::all();

        return view('shop-list', compact('shops', 'like', 'genres'));
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
        $rating = Rating::where('shop_id', $shop->id)->avg('rating');
        $comments = Rating::where('shop_id', $shop->id)->orderBy('created_at', 'desc')->take(3)->get();

        return view('shop-detail', compact('shop', 'previous', 'next', 'rating', 'comments'));
    }

    public function reservation(ReservationRequest $request, $id)
    {
        $reservation = New Reservation();
        $reservation->user_id = Auth::user()->id;
        $reservation->shop_id = $id;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->number = $request->number;
        $reservation->save();

        return view('reserve-completed');
    }

    public function cancel(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->delete();

        return view('cancel');
    }

    public function change($id) {
        $user = Auth::user();
        $reservation = Reservation::findOrFail($id);

        return view('reservation-change', compact('user', 'reservation'));
    }

    public function changeStore(ReservationRequest $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->number = $request->number;
        $reservation->save();

        return view('change-completed');
    }

    public function rating($id) {
        $user = Auth::user();
        $reservation = Reservation::findOrFail($id);

        return view('rating', compact('user', 'reservation'));
    }

    public function ratingStore(RatingRequest $request, $id) {
        $user = Auth::user();
        $reservation = Reservation::findOrFail($id);

        $rating = New Rating();
        $rating->user_id = $user->id;
        $rating->shop_id = $reservation->shop_id;
        $rating->reservation_id = $id;
        $rating->rating = $request->rating;
        $rating->comment = $request->comment;
        $rating->save();

        return redirect('/mypage');
    }
}