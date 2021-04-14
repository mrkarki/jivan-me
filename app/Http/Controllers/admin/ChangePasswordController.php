<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('admin.profile.changepassword');
    }
    public function changepass(Request $request)
    {
        $current_user_id = Auth::id();
        $users = [];
        $users = DB::table('users')
        ->select('users.password')
        ->where('users.id', '=', $current_user_id)
        ->get();
        //return Hash::check( $value, $user->password );
        //return $users['0']->password;


        $request->validate([
            'old_pass' => ['required' ],

            'new_pass' => ['required'],

            're_pass' => ['same:new_pass'],

        ],
        [

            'old_pass.required' => 'Current Password is Required', // custom message
            'new_pass.required' => 'New Password is Required', // custom message
            're_pass.same' => 'New Password and Re-typed new Password not match', // custom message

        ]);
        if (!Hash::check($request->old_pass, $users['0']->password)) {
            return back()->with('error', 'Current password does not match.');
        }

        User::find($current_user_id)->update(['password'=> Hash::make($request->new_pass)]);
        Session::flash('success', 'Password successfully updated.');
        return redirect()->route('admin.profile.index');


    }
}
