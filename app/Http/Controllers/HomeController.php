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
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $users = User::all();

        $product = Product::paginate(8);

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = ' ';
        }


        return view('home.index', compact('product', "count", 'users'));
    }

    public function login_home()
    {
        $users = User::all();

        $product = Product::paginate(8);

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = ' ';
        }
        return view('home.index', compact('product', 'count', 'users'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = ' ';
        }

        return view ('home.product_details', compact('data', 'count'));
    }

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
        
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }
        else
        {
            $count = ' ';
        }

        return view('home.mycart',compact('count', 'cart'));
    }

    public function remove_cart($id)
    {
        $data = Cart::find($id);

        $data->delete();

        toastr()->closeButton()->timeout(5000)->addSuccess('Product succesfully Removed from the cart!');

        return redirect()->back();
    }

    public function shop()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }
        else
        {
            $count = ' ';
        }
        return view('home.shop',compact('product','count'));
    }

    public function contact_us()
    {

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();

            $contact = Contact::where('user_id',$userid)->get();
        }
        else
        {
            $count = ' ';
        }
        return view('home.contact_us',compact('count', 'contact'));
    }

    public function why_us()
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }
        else
        {
            $count = ' ';
        }
        return view('home.why_us',compact('count'));
    }

    public function testimonial()
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }
        else
        {
            $count = ' ';
        }
        return view('home.testimonial',compact('count'));
    }

    public function add_contact_message(Request $request)
    {


        $user = Auth::user();

        $user_id = $user->id;

        $data = new Contact;

        $data->user_id = $user_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->message = $request->message;
       

        $data->save();

        toastr()->closeButton()->timeout(5000)->addSuccess('Message successfully sent!');

        return redirect()->back();
    }

    public function other_users()
    {
        $user = User::all();


        return view('home.other_users', compact('user'));
    }

    public function all_users()
    {
        $users = User::all();

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }
        else
        {
            $count = ' ';
        }
        return view('home.all_users',compact('users','count'));
    }

    public function user_detail($id)
    {
        $data = User::find($id);

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }
        else
        {
            $count = ' ';
        }

        return view ('home.user_detail', compact('data', 'count'));
    }
}
