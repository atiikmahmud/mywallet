<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OthersController extends Controller
{
    public function about()
    {
        $title = 'About';
        return view('user.others.about', compact('title'));
    }

    public function contact()
    {
        $title = 'Contact';
        $user = User::where('id', Auth::user()->id)->first();
        return view('user.others.contact', compact('title', 'user'));
    }

    public function contactMessage(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|max:255',
            'message'   => 'required',
        ]);

        try
        {
            $message = new Contact;
            $message->name = $request->name;
            $message->email = $request->email;
            $message->message = $request->message;            
            $message->save();            
            return redirect()->back()->with('success','Message sent');
        }
        catch (\Throwable $th) 
        {
            //throw $th;
            return redirect()->back()->with('error','Message not sent');
        }
    }
}
