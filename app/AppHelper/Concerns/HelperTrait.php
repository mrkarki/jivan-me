<?php

namespace App\AppHelper\Concerns;
use Illuminate\Support\Str;

/**
 * Trait HelperTrait
 */
trait HelperTrait
{

    /**
     * @param $id
     * @return mixed
     */
    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $data
     * @param array $search
     * @return mixed
     */
    public function createOrUpdate( array $data, array $search)
    {
        return $this->model->updateOrCreate(
            $search,
            $data
        );
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function new( array $data )
    {
        return $this->model->create( $data );
    }

    /**
     * @param array $data
     * @param $model
     * @return mixed
     */
    public function update( array $data, $model)
    {
        $instance = $model;
        $model->update( $data );
        return $instance;
    }

    /**
     * @param null $paginate
     * @return mixed
     */
    public function get( $paginate = null )
    {
        $that = $this->model;

        if (is_null($paginate)) {
            return $that->latest()
                ->get();
        }
        return $that->latest()->paginate($paginate);
    }

    /**
     * Here $data is new created record of that model
     * And $tags is single or multiple tag value
     *
     * @param $data
     * @param $tags
     * @return mixed
     */
    public function syncData($data,$tags)
    {
        return $data->tags()->sync((array) $tags);
    }

    /**
     * @param $model
     * @return bool
     */
    public function delete($model)
    {
        $model->delete();
        return true;
    }

    /**
     * Return the instance of the current model
     *
     * @return mixed
     */
    public function query()
    {
        return $this->model->query();
    }

    public function slug($model,$title){
        $placeObj = $model;

        $businessName = $title; //Input from User
        $businessNameURL = Str::slug($businessName, '-'); //Convert Input to Str Slug

        //Check if this Slug already exists
        $checkSlug = $placeObj->whereSlug($businessNameURL)->exists();

        if ($checkSlug) {
            //Slug already exists.

            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;

            while (1) {
                //Check if Slug with final prefix exists.

                $newSlug = $businessNameURL . "-" . $numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
                $newSlug = Str::slug($newSlug); //String Slug


                $checkSlug = $placeObj->whereSlug($newSlug)->exists(); //Check if already exists in DB
                //This returns true if exists.

                if (!$checkSlug) {

                    //There is not more coincidence. Finally found unique slug.
                    $slug = $newSlug; //New Slug

                    break; //Break Loop

                }
            }
        } else {
            //Slug do not exists. Just use the selected Slug.
            $slug = $businessNameURL;

        }
        return $slug;
    }

}
