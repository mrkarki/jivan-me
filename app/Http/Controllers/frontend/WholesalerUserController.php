<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WholesalerUserController extends Controller
{
    //
    public function create_user(Request $request)
    {


        $validated = $request->validate([
            'shop_name' => 'required',
            'pan_no' => 'required|unique:users,pan_no',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'pass' => 'required',
            'phone' => 'required|unique:users,phone',
        ], [
            'shop_name.required' => 'Shop Name is Required', // custom message
            'pan_no.required' => 'Pan No. is Required', // custom message
            'name.required' => 'Full Name is Required', // custom message
            'pass.required' => 'Password Name is Required', // custom message
            'phone.required' => 'Phone Number is Required', // custom message

        ]);
        $users = new User();
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->phone = $request['phone'];
        $users->password = Hash::make($request['pass']);
        $users->shop_name = $request['shop_name'];
        $users->address = $request['address'];
        $users->pan_no = $request['pan_no'];
        $users->doc_no = $request['doc_no'];
        $users->user_role = '3';
        $users->status = '1';
        $users->save();
        return redirect('/admin');
        //return view('admin');
    }
}
