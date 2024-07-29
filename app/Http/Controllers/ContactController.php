<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{

    public function view_contact()
    {
        $contact = Contact::all();


        return view('Contact.view_contact', compact('contact'));
    }

    public function update_contact($id)
    {
        $data = Contact::find($id);


        return view('Contact.update_contact', compact('data'));
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

    public function contact_us()
    {

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();

            $cart = Cart::where('user_id', $userid)->get();

            $contact = Contact::where('user_id', $userid)->get();
        } else {
            $count = ' ';
        }
        return view('Contact.contact_us', compact('count', 'contact'));
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
}
