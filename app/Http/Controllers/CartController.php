<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;

        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();

        toastr()->closeButton()->timeout(5000)->addSuccess('Product Successfully Added to the Cart!');

        return redirect()->back();
    }

    public function mycart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        } else {
            $count = ' ';
        }

        return view('Cart.mycart', compact('count', 'cart'));
    }

    public function remove_cart($id)
    {
        $data = Cart::find($id);
        $data->delete();

        toastr()->closeButton()->timeout(5000)->addSuccess('Product successfully Removed from the cart!');

        return redirect()->back();
    }

    public function purchase(Request $request)
    {

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        } else {
            $count = ' ';
        }


        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->price;
        });

        if ($user->balance < $totalPrice) {
            toastr()->closeButton()->timeout(5000)->addError('Insufficiant Gold!');
            return redirect()->back();
        }

        DB::transaction(function () use ($user, $cartItems, $totalPrice) {
            foreach ($cartItems as $cartItem) {
                // Add products to user's inventory by inserting into pivot table manually
                DB::table('user_products')->insert([
                    'user_id' => $user->id,
                    'product_id' => $cartItem->product_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Remove product from cart
                $cartItem->delete();
            }

            // Deduct the total price from the user's balance
            $user->balance -= $totalPrice;
            $user->save();
        });

        $products = $user->products; // Get the updated products for the user



        toastr()->closeButton()->timeout(5000)->addSuccess('Product successfully Added to your Inventory!');
        return view('inventory.index', compact('products', 'count'));
    }

    public function view_inventory()
    {
        $user = Auth::user();
        $products = $user->products; // Get the products the user has purchased

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = ' ';
        }

        return view('inventory.index', compact('products', 'count'));
    }
}
