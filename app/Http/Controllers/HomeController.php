<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    //The function index to return the views upon login
    public function index() {
        // A variable $role to get the role from the users table
        $role = Auth::user()->role;

        // Returning the views
        if ($role == 1) {
            return view('admin');
        }
        if ($role == 2) {
            return view('seller');
        }
        else {
            return view('dashboard');
        }
    }

    // For adding the sellers
    public function addseller(Request $request) {
        // A variable $data to add new user in the users
        $data = new user;

        // Connecting the new fields of the new seller
        // The $data points to the database field, and 
        // therequest points to the "name" in the input field
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password); //bcrypt is to encrypt the password
        $data->role='2'; //This is to have the seller role to 2

        $data->save(); //To save

        return redirect()->back();

    }

}
