<?php

namespace App\Services;

use App\Models\Tag;
use App\Generator\Base\BaseService;

/**
 * Class TagService
 * @package Foundation\Services
 */
class TagService extends BaseService
{

    /**
     * The Tag instance
     *
     * @var $model
     */
    protected $model;

    /**
     * CategoryService constructor.
     * @param Tag $category
     */
    public function __construct(Tag $category)
    {
        $this->model = $category;
    }

    /**
     * Filter
     *
     * @param string|null $name
     * @return mixed
     */
    public function filter(string $name = null)
    {
        return $this->model
            ->where(function ($query) use ($name){
                if($name){
                    $query->where('name','like', '%'. $name .'%');
                }
            })
            ->get();
    }

}
