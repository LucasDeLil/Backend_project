<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function home()
    {
        $users = User::all();

        $product = Product::paginate(8);

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = ' ';
        }


        return view('home.index', compact('product', "count", 'users'));
    }

    public function login_home()
    {
        $users = User::all();

        $product = Product::paginate(8);

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = ' ';
        }
        return view('home.index', compact('product', 'count', 'users'));
    }
    
    public function why_us()
    {
        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();

            $cart = Cart::where('user_id', $userid)->get();
        } else {
            $count = ' ';
        }
        return view('home.why_us', compact('count'));
    }

    public function about()
    {

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();

            $cart = Cart::where('user_id', $userid)->get();
        } else {
            $count = ' ';
        }

        return view('about', compact('count'));
    }

}
