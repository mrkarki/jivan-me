<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\AppHelper\Concerns\HelperTrait;
use ElementorPro\Modules\Woocommerce\Widgets\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Session;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input as InputInput;

class ProductController extends Controller
{
    use HelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role = Auth::user()->user_role;
        if ($role == 1) {
            $data = DB::table('products')
                //->join('roles', 'users.user_role', '=', 'roles.id')
                ->join('status', 'products.status', '=', 'status.id')
                ->select('products.*', 'status.desc as status')
                ->get();
        } else {
            $data = DB::table('products')
                //->join('roles', 'users.user_role', '=', 'roles.id')
                ->join('status', 'products.status', '=', 'status.id')
                ->select('products.*', 'status.desc as status')
                ->where('products.user_role', '=', $role)
                ->get();
        }

        if ($request->ajax()) {
            return datatables()
                ->of($data)
                // ->addColumn('created_at', function ($data) {
                //     return $data->created_at . " <code>{$data->created_at->diffForHumans()}</code>";
                // })
                ->addColumn('action', function ($data) {
                    $model = 'product';
                    $role = Auth::user()->user_role;
                    return view('admin.common.datatable.action', compact('data', 'model', 'role'))->render();
                })
                ->rawColumns(['action', 'created_at',])
                ->make(true);
        }

        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorys = DB::table('categories')
            ->select(['id', 'title', 'parent_id'])
            ->where('parent_id', '0')
            ->get()->toArray();
        //print_r($categorys);
        foreach ($categorys as $key => $cat) {
            //print_r($cat->id);
            // $categorys = DB::table('categories')
            //     ->select(['id', 'title', 'parent_id'])
            //     ->where('parent_id', $cat->id)
            //     ->get()->toArray();
            $category_array[$key] = $cat;
            foreach ($categorys as $key => $cat) {
                $categorys = DB::table('categories')
                    ->select(['id', 'title', 'parent_id'])
                    ->where('parent_id', $cat->id)
                    ->get()->toArray();
                    //dd($categorys);
                // foreach ($categorys as  $key => $cat) {
                //     $category_array[$key] = $cat;
                //     // foreach ($categorys as $key => $cat) {
                //     //     $categorys = DB::table('categories')
                //     //         ->select(['id', 'title', 'parent_id'])
                //     //         ->where('parent_id', $cat->id)
                //     //         ->get()->toArray();
                //     //     //print_r($categorys);
                //     //     $category_array[$key] = $cat;
                //     //     foreach ($categorys as $key => $cat) {
                //     //         $categorys = DB::table('categories')
                //     //             ->select(['id', 'title', 'parent_id'])
                //     //             ->where('parent_id', $cat->id)
                //     //             ->get()->toArray();
                //     //         //print_r($categorys);
                //     //         $category_array[$key] = $cat;
                //     //     }
                //     // }
                // }
            }
        }
       // print_r($category_array);


        //exit();
        $categorys = DB::table('categories')->pluck('title', 'id');
        $tags = DB::table('tags')->pluck('title', 'id');
        $color = DB::table('product_attributes')
            ->where('type', 'color')
            ->pluck('name', 'id');

        $size = DB::table('product_attributes')
            ->where('type', 'size')
            ->pluck('name', 'id');
        $role = Auth::user()->user_role;
        //return $color;
        //$last_id = DB::table('products')->get()->last()->id;
        // dd($id);
        return view('admin.product.create',  ['categorys' => $categorys, 'tags' => $tags, 'color' => $color, 'size' => $size, 'role' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$extension = $request->image->extension();
        $role = Auth::user()->user_role;
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $image_name = $request->image->getClientOriginalName();
                $image_extension = $request->image->extension();
                $request->image->storeAs('/products/', $image_name);
                $url = Storage::url('/products/' . $image_name);
            }
        } else {
            $url = '';
        }

        //glallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                //$photo = new Photo;
                // name it differently by time and count
                $image_name = $file->getClientOriginalName();
                $file->storeAs('/products/', $image_name);
                $gallery_url[] = Storage::url('/products/' . $image_name);
                //$product = new product();

            }
        } else {
            $gallery_url = '';
        }

        //return $url;
        $validated = $request->validate([
            'title' => 'required',
            //'sku' => 'unique:products,sku',
            'category_id' => 'required',
            //'regular_price' => 'required',
        ], [
            'category_id.required' => 'Category Name is Required', // custom message
            //'regular_price.required' => 'Regular Price is Required', // custom message

        ]);

        // print_r($gallery_url);
        // print_r($url);


        $product = new product();
        $product->title = $request['title'];
        $product->slug = $this->slug($product, $request['title']);
        // $product->sku = $auto_id;//$request['sku'];
        $product->model = $request['model'];
        $product->short_description = $request['short_description'];
        $product->description = $request['description'];
        $product->price_break_down = $request['price_break_down'];
        $product->category_id = json_encode($request['category_id']);
        $product->tag_id = json_encode($request['tag_id']);
        $product->regular_price = $request['regular_price'];
        $product->sale_price = $request['sale_price'];
        $product->regular_wholesale_price = $request['regular_wholesale_price'];
        $product->sale_wholesale_price = $request['sale_wholesale_price'];
        $product->in_stock = $request['in_stock'];
        $product->stock_qty = $request['stock_qty'];
        $product->on_sale = $request['on_sale'];
        $product->is_featured = $request['is_featured'];
        $product->status = $request['status'];
        $product->seo_title = $request['seo_title'];
        $product->seo_description = $request['seo_description'];
        $product->seo_keyword = $request['seo_keyword'];
        if ($url != '') {
            $product->main_image = $url;
        }
        if ($gallery_url != '') {
            $product->gallery_image = json_encode($gallery_url);
        }
        $color = $request['color_id'];
        $size = $request['size_id'];
        if (!empty($color) && !empty($size)) {
            $attributes = array_merge($size, $color);
        }
        if (empty($color)) {
            $attributes = $size;
        }
        if (empty($size)) {
            $attributes = $color;
        }
        $product->attributes = json_encode($attributes);
        $product->user_role = $role;
        // add other fields
        $product->save();

        $product->fresh();
        $product->sku = $product->id; //$request['sku'];
        $product->save();
        // echo $product->id;
        Session::flash('success', 'Record successfully created.');
        return view('admin.product.index');
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
        $product_data = new product();
        $data['row'] = $product_data->find($id);
        return view('admin.product.show', compact('data'));
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
        $product = new product();
        $data['row'] = $product->find($id);
        //$selected_category=$data['row']->category_id;
        // $data = DB::table('users')
        // ->join('roles', 'users.user_role', '=', 'roles.id')
        // ->join('status', 'users.status', '=', 'status.id')
        // ->select('users.*', 'roles.desc', 'status.desc as status')
        // ->get();
        $categorys = DB::table('categories')->pluck('title', 'id');
        $tags = DB::table('tags')->pluck('title', 'id');
        $color = DB::table('product_attributes')
            ->where('type', 'color')
            ->pluck('name', 'id');

        $size = DB::table('product_attributes')
            ->where('type', 'size')
            ->pluck('name', 'id');
        $role = Auth::user()->user_role;
        return view('admin.product.edit', compact('data', 'categorys', 'tags', 'color', 'size','role'));
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
        //return $request;
        $product = new product();

        $product_update = $product->find($id);

        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $image_name = $request->image->getClientOriginalName();
                $image_extension = $request->image->extension();
                $request->image->storeAs('/products/', $image_name);
                $url = Storage::url('/products/' . $image_name);
                $product_update->update(['main_image' => $url]);
            }
        }
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                //$photo = new Photo;
                // name it differently by time and count
                $image_name = $file->getClientOriginalName();
                $file->storeAs('/products/', $image_name);
                $gallery_url[] = Storage::url('/products/' . $image_name);
                //$product = new product();

            }
        } else {
            $gallery_url = '';
        }
        //return $gallery_url;
        if ($gallery_url != '') {
            $product_update->update(['gallery_image' => json_encode($gallery_url)]);
        }
        $color = $request['color_id'];
        $size = $request['size_id'];
        if (!empty($color) && !empty($size)) {
            $attributes = array_merge($size, $color);
        }
        if (empty($color)) {
            $attributes = $size;
        }
        if (empty($size)) {
            $attributes = $color;
        }
        $product_update->update(['attributes' => json_encode($attributes)]);
        $product_update->update($request->all());

        Session::flash('success', 'Record successfully updated.');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = new product();
        $product_del = $product->find($id);
        $product_del->delete();
        return redirect()->route('admin.product.index');
    }
}
