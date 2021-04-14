<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'parent_id',
        'parent_name',
        'description',
        'status',
        'seo_title',
        'seo_description',
        'seo_keyword',
    ];
}
