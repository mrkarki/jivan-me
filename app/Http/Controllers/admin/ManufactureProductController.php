<?php

namespace App\Http\Controllers\admin;

use App\AppHelper\Support\ProductType;
use App\Models\Category;
use App\Models\ManufactureProduct;
use App\Models\product_attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\AppHelper\Concerns\HelperTrait;
use Session;



class ManufactureProductController extends Controller
{
    use HelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['parentChild'] = $this->getParentWithChild();
        $data['tags'] = DB::table('tags')->where('status', 1)->pluck('tag_name', 'id');
        $data['product_attributes'] = $this->getParentChildAttribute();
        $data['product_type'] = ProductType::$current;
        $role = Auth::user()->user_role;
        return view('admin.manufacture-product.create', compact('data', 'role'));
    }

    public function getParentChildAttribute()
    {
        $att = [];
        $attributes = product_attribute::select('id', 'type', 'name')
            ->where('status','1')
            ->get()->toArray();
        foreach ($attributes as $attKey => $attribute) {
            if($attribute['type'] == 'color' ){
                $att['color'][] = $attribute;
            }
            else{
                $att['size'][] = $attribute;
            }
        }
        return $att;

    }
    public function getParentWithChild(){
        $childs = [];
        $parents = [];
        $parentChild = [];
        $categories = Category::select('id', 'title', 'parent_id')->where('status','1')->get()->toArray();
        foreach ($categories as $catKey => $category){
            if($category['parent_id'] == 0){
                $parents[] = $category;
            }
            else{
                $childs[] = $category;
            }
        }
        foreach ($parents as $keyParent => $parent){
            $parentChild[] = $parent;
            foreach ($childs as $keyChild => $child){
                if($parent['id'] == $child['parent_id']){
                    $parentChild[$keyParent]['child'][] = $child;
                }
            }
        }
        return $parentChild;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new ManufactureProduct();
        $product->title = $request['title'];
        $product->slug = $this->slug($product,$request['title']);
        $product->model_number = $request['model_number'];
        $product->short_description = $request['short_description'];
        $product->description = $request['description'];
        $product->category_id = json_encode($request['category_id']);
//        $product->tag_id = json_encode($request['tag_id']);
        $product->regular_price = $request['regular_price'];
        $product->group_price_one = $request['group_price_one'];
        $product->group_price_one = $request['group_price_one'];
        $product->in_stock = $request['in_stock']?? '0';
        $product->qty = $request['qty'];
        $product->on_sale = $request['on_sale'];
//        $product->is_featured = $request['is_featured'];
        $product->status = $request['status'];
        $product->role_id =Auth::id();
        $product->created_by =Auth::id();
        $product->save();

        if( $product ){
            $this->syncData($product,$request->get('tags'));
        }

        Session::flash('success', 'Record successfully created.');
        return view('admin.manufacture-product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManufactureProduct  $manufactureProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ManufactureProduct $manufactureProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManufactureProduct  $manufactureProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ManufactureProduct $manufactureProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManufactureProduct  $manufactureProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManufactureProduct $manufactureProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManufactureProduct  $manufactureProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManufactureProduct $manufactureProduct)
    {
        //
    }
}
