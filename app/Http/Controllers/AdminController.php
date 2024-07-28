<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }
}
