<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Auth::user()->user_role;
        // if(1== Auth::user()->user_type){
        //     echo "admin";
        // }else{

        // }
        //dd(User::all());

        $data = DB::table('users')
            ->join('roles', 'users.user_role', '=', 'roles.id')
            ->join('status', 'users.status', '=', 'status.id')
            ->select('users.*', 'roles.desc', 'status.desc as status')
            ->get();
        //print_r($users);
        if ($request->ajax()) {
            return datatables()
                ->of($data)
                // ->addColumn('created_at', function ($data) {
                //     return $data->created_at . " <code>{$data->created_at->diffForHumans()}</code>";
                // })
                ->addColumn('action', function ($data) {
                    $model = 'user';
                    $role=Auth::user()->user_role;
                    return view('admin.common.datatable.action', compact('data', 'model', 'role'))->render();
                })
                ->rawColumns(['action', 'created_at',])
                ->make(true);
        }

        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = DB::table('roles')->pluck('desc', 'id');
        $roles->prepend('Please Select Role', '');
        return view('admin.user.create',  ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = $request->user_role;
        if ($role == 2 || $role == 3) {
            $validated = $request->validate([
                'shop_name' => 'required',
                'pan_no' => 'required|unique:users,pan_no',
                'name' => 'required',
                'email' => 'required|required',
                'pass' => 'required',
                'phone' => 'required',
            ], [
                'shop_name.required' => 'Shop Name is Required', // custom message
                'pan_no.required' => 'Pan No. is Required', // custom message
                'name.required' => 'User Name is Required', // custom message
                'pass.required' => 'Password Name is Required', // custom message

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
            $users->user_role = $role;
            $users->status = $request['status'];
            $users->save();
            return redirect('/admin');
        } else {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|required',
                'pass' => 'required',
                'phone' => 'required',
            ], [

                'name.required' => 'Full Name is Required', // custom message
                'pass.required' => 'Password Name is Required', // custom message

            ]);
            $users = new User();
            $users->name = $request['name'];
            $users->email = $request['email'];
            $users->phone = $request['phone'];
            $users->password = Hash::make($request['pass']);
            $users->user_role = $role;
            $users->status = $request['status'];
            $users->save();
        }
        Session::flash('success', 'Record successfully created.');
        return view('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = [];
        $user_data = new user();
        $data_new['row'] = $user_data->find($id);
        $data   = DB::table('users')
            ->join('roles', 'users.user_role', '=', 'roles.id')
            ->join('status', 'users.status', '=', 'status.id')
            ->select('users.*', 'roles.desc', 'status.desc as status')
            ->where('users.id', '=', $id)
            ->get();
            //$data = json_decode($data, true);
       //return $data;
        return view('admin.user.show', compact('data','data_new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $users = User::all();
        $data['row'] = $users->find($id);
        $roles = DB::table('roles')->pluck('desc', 'id');
        $roles->prepend('Please Select Role', '');
        return view('admin.user.edit', compact('data', 'roles', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = new user();
        $user_update = $user->find($id);
        $role = $request->user_role;
        if ($role == 2 || $role == 3) {
            $validated = $request->validate([
                'shop_name' => 'required',
                'pan_no' => 'required|unique:users,pan_no,'.$id,
                'name' => 'required',
                'email' => 'required|required',
                'phone' => 'required',
            ], [
                'shop_name.required' => 'Shop Name is Required', // custom message
                'pan_no.required' => 'Pan No. is Required', // custom message
                'name.required' => 'User Name is Required', // custom message
                'pass.required' => 'Password Name is Required', // custom message

            ]);
            $user_update->name = $request['name'];
            $user_update->email = $request['email'];
            $user_update->phone = $request['phone'];
            $user_update->password = Hash::make($request['pass']);
            $user_update->shop_name = $request['shop_name'];
            $user_update->address = $request['address'];
            $user_update->pan_no = $request['pan_no'];
            $user_update->doc_no = $request['doc_no'];
            $user_update->user_role = $role;
            $user_update->status = $request['status'];
            $user_update->save();
            //return redirect('/admin');
        } else {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|required',
                'phone' => 'required',
            ], [

                'name.required' => 'Full Name is Required', // custom message
                'pass.required' => 'Password Name is Required', // custom message

            ]);
            $user_update->name = $request['name'];
            $user_update->email = $request['email'];
            $user_update->phone = $request['phone'];
            if (!empty($request['pass'])) {
                $user_update->password = Hash::make($request['pass']);
            }

            $user_update->user_role = $role;
            $user_update->status = $request['status'];
            $user_update->save();
        }
        Session::flash('success', 'Record successfully updated.');
        return view('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = new user();
        $user_del = $user->find($id);
        $user_del->delete();
        Session::flash('success', 'Record successfully deleted.');
        return redirect()->route('admin.user.index');
    }
}
