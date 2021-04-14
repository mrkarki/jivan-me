<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\AppHelper\Concerns\HelperTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\Factory;
use Session;

class CategoryController extends Controller
{
    use HelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return datatables()
                ->of(DB::table('categories')
                    ->select('*'))
                ->addColumn('action', function ($data) {
                    $model = 'category';
                    $role = Auth::user()->user_role;
                    return view('admin.common.datatable.action', compact('data', 'model', 'role'))->render();
                })
                ->rawColumns(['action', 'created_at',])
                ->make(true);
        }

        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = DB::table('categories')->where('parent_id', '0')->pluck('title', 'id');
        $categorys->prepend('Please Select Parents', '0');
        //dd($categorys);
        return view('admin.category.create',  ['categorys' => $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
        ]);
        $Category = new Category();
        $Category->title = $request['title'];
        $Category->slug = $this->slug($Category, $request['title']);
        $Category->parent_id = $request['parent_id'] ?? 0;
        $Category->description = $request['description'];
        $Category->created_by = auth()->id();
        $Category->status = $request['status'];
        $Category->save();
        Session::flash('success', 'Record successfully created.');
        return view('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Category_data = new Category();
        $data['row'] = $Category_data->find($id);
        return view('admin.category.show', compact('data'));
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
        $Category = new Category();
        $data['row'] = $Category->find($id);
        $categorys = DB::table('categories')->where('parent_id', '0')->pluck('title', 'id');
        $categorys->prepend('Please Select Parents', '');
        return view('admin.category.edit', compact('data', 'categorys'));
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
        $parent_id = $request->get('parent_id') ?? 0;

        $Category = new Category();
        $Category_update = $Category->find($id);
        $Category_update->update($request->merge([
            'parent_id' => $parent_id,
            'created_by' => auth()->id(),
        ])->all());
        Session::flash('success', 'Record successfully updated.');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = new Category();
        $Category_del = $Category->find($id);
        $Category_del->delete();
        return redirect()->route('admin.category.index');
    }
}
