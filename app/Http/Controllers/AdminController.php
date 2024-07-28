<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
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

        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);

        $data->category_name = $request->category;

        $data->save();

        toastr()->closeButton()->timeout(5000)->addSuccess('Category succesfully edited!');

        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();

        return view('admin.add_product', compact('category'));
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

        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);

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

        return view('admin.update_product', compact('data', 'category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image_path = public_path('products/'.$data->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }
        
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

        $product = Product::where('title','LIKE','%'.$search.'%' )->orWhere('category','LIKE','%'.$search.'%')->paginate(5);

        return view('admin.view_product', compact('product'));
    }

    public function view_user()
    {
        $user = User::all();


        return view('admin.view_user', compact('user'));
    }

    public function update_user($id)
    {
        $data = User::find($id);


        return view('admin.update_user', compact('data'));
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

    public function view_contact()
    {
        $contact = Contact::all();


        return view('admin.view_contact', compact('contact'));
    }

    public function update_contact($id)
    {
        $data = Contact::find($id);


        return view('admin.update_contact', compact('data'));
    }

    public function edit_contact(Request $request, $id)
    {
        $data = Contact::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->message = $request->message;
        $data->response = $request->response;
        $data->status = $request->status;

        
        $data->save();

        toastr()->closeButton()->timeout(5000)->addSuccess('Answer succesfully Sent!');

        return redirect()->back();
    }
}
