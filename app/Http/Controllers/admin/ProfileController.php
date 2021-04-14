<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class ProfileController extends Controller
{
    public function index()
    {
        $current_user_id = Auth::id();
        //return $current_user_id;
        $data   = DB::table('users')
            ->join('roles', 'users.user_role', '=', 'roles.id')
            ->join('status', 'users.status', '=', 'status.id')
            ->select('users.*', 'roles.desc', 'status.desc as status')
            ->where('users.id', '=', $current_user_id)
            ->get();
        return view('admin.profile.index', ['data' => $data]);
    }
    // public function show()
    // {
    //     $current_user_id= Auth::id();
    //     $user = [];
    //     $user_data = new user();
    //     $data_new['row'] = $user_data->find($current_user_id);
    //     $data   = DB::table('users')
    //         ->join('roles', 'users.user_role', '=', 'roles.id')
    //         ->join('status', 'users.status', '=', 'status.id')
    //         ->select('users.*', 'roles.desc', 'status.desc as status')
    //         ->where('users.id', '=', $current_user_id)
    //         ->get();
    //         //$data = json_decode($data, true);
    //    //return $data;
    //     return view('admin.profile.show', compact('data','data_new'));
    // }
    public function edit($id)
    {
        //$current_user_id= Auth::id();
        $users = [];
        $users = User::all();
        $data['row'] = $users->find($id);
        return view('admin.profile.edit', compact('data',));
    }
    public function update(Request $request, $id)
    {
        //return $id;
        $user = new user();
        $user_update = $user->find($id);
        $role = $user_update->user_role;
        //return $role;
        if ($role == 2 || $role == 3) {
            $validated = $request->validate([
                'shop_name' => 'required',
                'pan_no' => 'required|unique:users,pan_no,'.$id,
                'name' => 'required',
                'phone' => 'required',
            ], [
                'shop_name.required' => 'Shop Name is Required', // custom message
                'pan_no.required' => 'Pan No. is Required', // custom message
                'name.required' => 'User Name is Required', // custom message

            ]);
            $user_update->name = $request['name'];

            $user_update->shop_name = $request['shop_name'];
            $user_update->address = $request['address'];
            $user_update->pan_no = $request['pan_no'];
            $user_update->doc_no = $request['doc_no'];
            $user_update->save();
            //return redirect('/admin');
        } else {
            $validated = $request->validate([
                'name' => 'required',
                'phone' => 'required',
            ], [
                'name.required' => 'Full Name is Required', // custom message
                'pass.required' => 'Password Name is Required', // custom message
            ]);
            $user_update->name = $request['name'];
            $user_update->phone = $request['phone'];
            $user_update->save();
        }
        Session::flash('success', 'Record successfully updated.');
        return redirect()->route('admin.category.index');
    }

}
