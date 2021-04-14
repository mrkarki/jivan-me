<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufactureProduct extends Model
{
    use HasFactory;
    protected $table = 'manufacture_products';
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'model_number',
        'short_description',
        'description',
        'regular_price',
        'group_price_one',
        'group_price_two',
        'discount',
        'discount_type',
        'in_stock',
        'qty',
        'on_sale',
        'product_type',
        'attributes',
        'status',
        'gallery_image',
        'role_id',
        'updated_by',
        'created_by',
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }
}
