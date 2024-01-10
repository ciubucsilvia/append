<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;

abstract class CoreRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    protected function startConditions()
    {
        return clone $this->model;
    }

    /**
     * Return collection von elements
     * @param attributes = object
     * @param columns = [el1, 3l, el3, ...]
     * @param where = [el1, el2] 
     * @param take = int
     * @param with = [el1, el2]
     * @param perPage = int
     */
    public function get($attributes)
    {
        // Set default parameter
        if(!isset($attributes->columns)) {
            $attributes->columns = '*';
        }

        $result = $this
            ->startConditions()
            ->orderBy('id', 'DESC')
            ->select($attributes->columns);
        
        if(isset($attributes->where)) {
            $result->where($attributes->where[0], $attributes->where[1]);
        }

        if(isset($attributes->take)) {
            $result->take($attributes->take);
        }

        if(isset($attributes->with)){
            $result->with($attributes->with);
        }

        if(isset($attributes->perPage)) {
            return $result->paginate($attributes->perPage);
        } else {
            return $result->get();
        }    
    }

    public function getAllWithPaginate()
    {
        $attributes = new \stdClass;
        $attributes->perPage = config('settings.admin.paginate');
        
        return $this->get($attributes);
    }

    public function getForComboBox()
    {
        $result = $this
            ->startConditions()
            ->pluck('name', 'id');
            
        return $result;
    }

    public function getForComboBoxActive($column = 'name')
    {
        $result = $this
            ->startConditions()
            ->where('active', 1)
            ->pluck($column, 'id');
            
        return $result;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * set property 'active' = true/false
     */
    public function setActive($model, $data)
    {
        $model->active = (isset($data['active'])) ? true : false;
        $model->save();
    }

    /**
     * set property 'is_team' = true/false
     */
    public function setIsTeam($model, $data)
    {
        $model->is_team = (isset($data['is_team'])) ? true : false;
        $model->save();
    }

    /**
     * set property 'is_published' = true/false
     */
    public function setPublished($model, $data)
    {
        $model->is_published = (isset($data['is_published'])) ? 1 : 0;
        if($model->is_published) {
            $model->published_at = now();
        }
        $model->save();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function getBySlug($slug)
    {
        $result = $this->model
            ->where('slug', $slug)
            ->first();
        
        return $result;
    }

    /**
     * save 1 Image
     * add to model
     */
    public function saveImage($model, $file, $folder)
    {
        $path = $this->putFileStoragePath($folder, $file);
        // dd($path);
        if($model->image) {
            $this->deleteImage($model->image, $folder);
        }

        $model->image = basename($path);
        $model->save();
    }

    /**
     * save more Images as Json
     * add to model
     */
    public function saveImageInJson($model, $files, $folder)
    {
        $items = [];
        // save images in Folder
        foreach($files as $file) {
            $path = $this->putFileStoragePath($folder, $file);   
            $items[] = basename($path);
        }
        
        // Delete alt images
        if($model->image) {
            $this->deleteJsonImage($model->image, $folder);
        }

        // Save neu Images to model
        $model->image = json_encode($items);
        $model->save();
    }

    public function deleteImage($file, $folder)
    {
        Storage::disk('public')->delete(env('THEME') . '/images/' . $folder .  '/' . $file);
    }

    public function deleteJsonImage($images, $folder)
    {
        $images = json_decode($images);
            
        foreach($images as $image) {
            $this->deleteImage($image, $folder);
        }
    }

    private function putFileStoragePath($folder, $file)
    {
        return Storage::disk('public')
            ->put(env('THEME') . '/images/' . $folder, $file);
    }
}