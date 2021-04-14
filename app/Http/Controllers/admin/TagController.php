<?php

namespace App\Http\Controllers\admin;

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
        if ($request->ajax()) {
            $data = DB::table('tags')
                ->select('id','tag_name','slug','description','status')
                ->get();
            return datatables()
                ->of($data)
                ->addColumn('action', function ($data) {
                    $model = 'tag';
                    $role = Auth::user()->user_role;
                    return view('admin.common.datatable.action', compact('data', 'model','role'))->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.tag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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
            'tag_name' => 'required|max:255',
        ]);
        $tag = new Tag();
        $tag->tag_name = $request['tag_name'];
        $tag->slug = $this->slug($tag, $request['tag_name']);
        $tag->description = $request['description'];
        $tag->status = $request['status'];
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
        $tag = new Tag();
        $tag_update = $tag->find($id);
        $tag_update->update($request->all());

        Session::flash('success', 'Record successfully updated.');
        return redirect()->route('admin.tag.index');
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
