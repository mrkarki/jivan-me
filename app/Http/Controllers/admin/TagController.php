<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\Factory;
use App\AppHelper\Concerns\HelperTrait;
use Illuminate\Support\Facades\Auth;
use Session;

class TagController extends Controller
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

            $data = DB::table('tags')
            ->join('status', 'tags.status', '=', 'status.id')
            ->select('tags.*', 'status.desc as status')
            ->get();
            return datatables()
                ->of($data)
                // ->addColumn('created_at', function ($data) {
                //     return $data->created_at . " <code>{$data->created_at->diffForHumans()}</code>";
                // })
                ->addColumn('action', function ($data) {
                    $model = 'tag';
                    $role=Auth::user()->user_role;
                    // $role=$role;
                    return view('admin.common.datatable.action', compact('data', 'model', 'role'))->render();
                })
                ->rawColumns(['action', 'created_at',])
                ->make(true);
        }
        return view('admin.tag.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$tags = DB::table('tags')->get();
        $tags = DB::table('tags')->pluck('title', 'id');
        //dd($tags);
        return view('admin.tag.create',  ['tags' => $tags]);
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
            'title' => 'required|max:255|unique:tags,title,',
        ]);

        $tag = new Tag();
        $tag->title = $request['title'];
        $tag->slug = $this->slug($tag, $request['title']);
        $tag->description = $request['description'];
        $tag->status = $request['status'];
        $tag->created_by = $role;
        // add other fields
        $tag->save();
        Session::flash('success', 'Record successfully created.');
        return view('admin.tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = [];
        $tag_data = new Tag();
        $data['row'] = $tag_data->find($id);
        return view('admin.tag.show', compact('data'));
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
        $tag = new Tag();
        $data['row'] = $tag->find($id);
        return view('admin.tag.edit', compact('data'));
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

        // add other fields
        if(Auth::user()){
            $role=Auth::user()->user_role;
        }else{
            $role=1;
        }
        $validated = $request->validate([
            'title' => 'required|max:255|unique:tags,title,'.$id,
            //'sku' => 'unique:products,sku',
        ]);
        $tag = new Tag();
        $tag_update = $tag->find($id);
        $tag_update->update(['updated_by' => $role]);
        //return $request;
        $tag_update->update($request->all());
        Session::flash('success', 'Record successfully updated.');
        return redirect()->route('admin.tag.index');
        // $tag->save();

        //return $this->redirect($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = new Tag();
        $tag_del = $tag->find($id);
        $tag_del->delete();
        return redirect()->route('admin.tag.index');
    }
}
