<?php

namespace App\Http\Controllers\admin;

use App\AppHelper\Concerns\HelperTrait;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class BrandController extends Controller
{
    use HelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role=Auth::user()->user_role;
        if ($request->ajax()) {

            $data = DB::table('brands')
            ->join('status', 'brands.status', '=', 'status.id')
            ->select('brands.*', 'status.desc as status')
            ->get();
            return datatables()
                ->of($data)
                // ->addColumn('created_at', function ($data) {
                //     return $data->created_at . " <code>{$data->created_at->diffForHumans()}</code>";
                // })
                ->addColumn('action', function ($data) {
                    $model = 'brand';
                    $role=Auth::user()->user_role;
                    // $role=$role;
                    return view('admin.common.datatable.action', compact('data', 'model', 'role'))->render();
                })
                ->rawColumns(['action', 'created_at',])
                ->make(true);
        }
        return view('admin.brand.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Auth::user()){
            $role=Auth::user()->user_role;
        }else{
            $role=1;
        }
        //
        $validated = $request->validate([
            'title' => 'required|max:255|unique:brands,title',
            //'sku' => 'unique:products,sku',
        ]);
        $brand = new Brands();
        $brand->title = $request['title'];
        $brand->slug = $this->slug($brand, $request['title']);
        $brand->description = $request['description'];
        $brand->status = $request['status'];
        $brand->created_by = $role;
        // add other fields
        $brand->save();
        Session::flash('success', 'Record successfully created.');
        return view('admin.brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = [];
        $brand_data = new Brands();
        $data['row'] = $brand_data->find($id);
        return view('admin.brand.show', compact('data'));
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
        $brand = new Brands();
        $data['row'] = $brand->find($id);
        return view('admin.brand.edit', compact('data'));
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
        if(Auth::user()){
            $role=Auth::user()->user_role;
        }else{
            $role=1;
        }
        $validated = $request->validate([
            'title' => 'required|max:255|unique:brands,title,'.$id,
            //'sku' => 'unique:products,sku',
        ]);
        $brand = new Brands();
        $brand_update = $brand->find($id);
        $brand_update->update(['updated_by' => $role]);
        //return $request;
        $brand_update->update($request->all());
        Session::flash('success', 'Record successfully updated.');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = new Brands();
        $brand_del = $brand->find($id);
        $brand_del->delete();
        return redirect()->route('admin.brand.index');
    }
}
