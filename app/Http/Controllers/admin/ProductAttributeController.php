<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product_attribute;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('product_attributes')
            ->join('status', 'product_attributes.status', '=', 'status.id')
            ->select('product_attributes.*', 'status.desc as status')
            ->get();
        if ($request->ajax()) {
            return datatables()
                ->of($data)
                // ->addColumn('created_at', function ($data) {
                //     return $data->created_at . " <code>{$data->created_at->diffForHumans()}</code>";
                // })
                ->addColumn('action', function ($data) {
                    $model = 'attribute';
                    $role=Auth::user()->user_role;
                    return view('admin.common.datatable.action', compact('data', 'model','role'))->render();
                })
                ->rawColumns(['action', 'created_at',])
                ->make(true);
        }

        return view('admin.attribute.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categorys = DB::table('categories')->pluck('title', 'id');
        // $tags = DB::table('tags')->pluck('title', 'id');
        // //$last_id = DB::table('products')->get()->last()->id;
        // // dd($id);
        return view('admin.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role=Auth::user()->user_role;
        //return $url;
        $validated = $request->validate([
            'name' => 'required|unique:product_attributes,name',
            //'title' => 'unique:product_attributes,name',
            //'regular_price' => 'required',
        ], [
            'name.required' => 'Title is Required', // custom message
            'name.unique' => 'Title is already taken', // custom message

        ]);

        $db = new product_attribute();
        $db->type = $request['attr_type'];
        $db->name = $request['name'];
        $db->desc = $request['desc'];
        $db->status = $request['status'];
        $db->created_by = $role;
        $db->save();
        Session::flash('success', 'Record successfully created.');
        return view('admin.attribute.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = [];
        $product_data = new product_attribute();
        $data['row'] = $product_data->find($id);
        return view('admin.attribute.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = [];
        $product_data = new product_attribute();
        $data['row'] = $product_data->find($id);
        return view('admin.attribute.edit', compact('data'));
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
        $role=Auth::user()->user_role;
        $validated = $request->validate([
            'name' => 'required|max:255|unique:product_attributes,name,'.$id,
            //'sku' => 'unique:products,sku',
        ], [
            'name.required' => 'Title is Required', // custom message
            'name.unique' => 'Title is already taken', // custom message

        ]);
        $attribute = new product_attribute();
        $attribute_update = $attribute->find($id);
        //return $request;
        $attribute_update->update($request->all());
        $attribute_update->update(['updated_by' => $role]);

        Session::flash('success', 'Record successfully updated.');
        return redirect()->route('admin.attribute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = new product_attribute();
        $attribute_del = $attribute->find($id);
        $attribute_del->delete();
        return redirect()->route('admin.attribute.index');
    }
}
