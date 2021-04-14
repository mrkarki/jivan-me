<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;


Relation::morphMap([
    'manufacture_product'=>'App\Models\ManufactureProduct'
]);

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_name',
        'slug',
        'description',
        'status',
    ];
    public function posts()
    {
        return  $this->morphedByMany(ManufactureProduct::class,'taggable');
    }
}
