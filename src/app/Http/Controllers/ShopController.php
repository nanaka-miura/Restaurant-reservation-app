<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use App\Models\Reservation;
use App\Models\Rating;
use App\Models\Genre;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\RatingRequest;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::with('genre')->get();
        $userId = Auth::id();
        $genres = Genre::all();
        $like = Like::where('user_id', $userId)->pluck('shop_id')->toArray();
        foreach ($shops as $shop) {
            $shop->image_url = Storage::disk('s3')->url($shop->image);
        }

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
        $menus = Menu::where('shop_id', $shop->id)->get();
        $rating = Rating::where('shop_id', $shop->id)->avg('rating');
        $comments = Rating::where('shop_id', $shop->id)->orderBy('created_at', 'desc')->take(3)->get();

        return view('shop-detail', compact('shop', 'previous', 'next', 'menus', 'rating', 'comments'));
    }

    public function reservation(ReservationRequest $request, $id)
    {
        $reservation = New Reservation();
        $reservation->user_id = Auth::user()->id;
        $reservation->shop_id = $id;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->number = $request->number;
        $reservation->menu_id = $request->menu_id;
        $reservation->save();

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $menu = Menu::find($request->menu_id);
        $price = $menu->price;
        $numberOfPeople = intval($request->number);
        $totalPrice = $price * $numberOfPeople;

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'jpy',
                    'product_data' => [
                        'name' => $menu->menu,
                    ],
                    'unit_amount' => $totalPrice * 1
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => env('APP_URL') . '/reserve/thanks',
            'cancel_url' => env('APP_URL') . '/'
        ]);

        return redirect($session->url);
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
        $shop = Shop::where('id', $reservation->shop->id)->first();

        $menus = Menu::where('shop_id', $shop->id)->get();

        return view('reservation-change', compact('user', 'reservation', 'menus'));
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

    public function thanks() {
        return view('reserve-completed');
    }
}