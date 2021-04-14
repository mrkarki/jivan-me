<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NormalUserController extends Controller
{
    //
    public function create_user(Request $request)
    {


        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|required',
            'pass' => 'required',
            'phone' => 'required',
        ], [

            'name.required' => 'Full Name is Required', // custom message
            'pass.required' => 'Password Name is Required', // custom message
            'phone.required' => 'Phone Number is Required', // custom message

        ]);
        $users = new User();
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->phone = $request['phone'];
        $users->password = Hash::make($request['pass']);
        $users->user_role = '4';
        $users->status = '1';
        $users->save();
        return redirect('/admin');
        //return view('admin');
    }
}
