<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function view_user()
    {
        $user = User::all();


        return view('User.view_user', compact('user'));
    }

    public function update_user($id)
    {
        $data = User::find($id);


        return view('User.update_user', compact('data'));
    }

    public function edit_user(Request $request, $id)
    {
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->usertype = $request->usertype;
        $data->phone = $request->phone;
        $data->birthday = $request->birthday;


        $data->save();

        toastr()->closeButton()->timeout(5000)->addSuccess('User succesfully Edited!');

        return redirect()->back();
    }

    public function other_users()
    {
        $user = User::all();


        return view('User.other_users', compact('user'));
    }

    public function all_users()
    {
        $users = User::all();

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();

            $cart = Cart::where('user_id', $userid)->get();
        } else {
            $count = ' ';
        }
        return view('User.all_users', compact('users', 'count'));
    }

    public function user_detail($id)
    {
        $data = User::find($id);

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = ' ';
        }

        return view('User.user_detail', compact('data', 'count'));
    }
}
