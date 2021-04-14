<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sku',
        'model',
        'short_description',
        'description',
        'price_break_down',
        'category_id',
        'tag_id',
        'regular_price',
        'sale_price',
        'regular_wholesale_price',
        'sale_wholesale_price',
        'in_stock',
        'stock_qty',
        'on_sale',
        'is_featured',
        'status',
        'main_image',
        'gallery_image',
        'attributes',
        'seo_title',
        'seo_description',
        'seo_keyword',
    ];
}

