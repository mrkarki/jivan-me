<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
        'status',
        'image',
        'role_id',
        'rel_key',
        'updated_by',
        'created_by',
        'seo_title',
        'seo_keywords',
        'seo_description'
    ];
}
