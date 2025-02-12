<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function add_product()
    {
        $category = Category::all();

        return view('Product.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->closeButton()->timeout(5000)->addSuccess('Product succesfully created!');

        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::paginate(5);

        return view('Product.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        $image_path = public_path('products/' . $data->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $data->delete();

        toastr()->closeButton()->timeout(5000)->addSuccess('Product succesfully deleted!');

        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Product::find($id);

        $category = Category::all();

        return view('Product.update_product', compact('data', 'category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

       
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }
        $data->save();

        toastr()->closeButton()->timeout(5000)->addSuccess('Product succesfully Edited!');

        return redirect()->back();
    }
    public function product_search(Request $request)
    {
        $search = $request->search;

        $product = Product::where('title', 'LIKE', '%' . $search . '%')->orWhere('category', 'LIKE', '%' . $search . '%')->paginate(5);

        return view('Product.view_product', compact('product'));
    }

    public function shop()
    {
        $product = Product::all();

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();

            $cart = Cart::where('user_id', $userid)->get();
        } else {
            $count = ' ';
        }
        return view('Product.shop', compact('product', 'count'));
    }

    public function view_category()
    {
        $data = Category::all();

        return view('Product.category', compact('data'));
    }

    public function add_category(Request $request)
    {

        $category = new Category;


        $category->category_name = $request->category;

        $category->save();

        toastr()->closeButton()->timeout(5000)->addSuccess('Category succesfully added!');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        toastr()->closeButton()->timeout(5000)->addSuccess('Category succesfully deleted!');

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('Product.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);

        $data->category_name = $request->category;

        $data->save();

        toastr()->closeButton()->timeout(5000)->addSuccess('Category succesfully edited!');

        return redirect('/view_category');
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = ' ';
        }

        return view('Product.product_details', compact('data', 'count'));
    }
}
