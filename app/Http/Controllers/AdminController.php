<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Contact;
use App\Models\FAQItem;
use App\Models\Product;

class AdminController extends Controller
{

    

    public function index()
    {
        $user = User::where('usertype', 'user')->count();
        $product = Product::all()->count();
        $faq = FAQItem::all()->count();
        $contact = Contact::all()->count();

        return view('admin.index', compact('user', 'product', 'faq', 'contact'));
    }
}
