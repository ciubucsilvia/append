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
     * @param with = 
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

    public function getForComboBoxActive()
    {
        $result = $this
            ->startConditions()
            ->where('active', 1)
            ->pluck('name', 'id');
            
        return $result;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function setActive($model, $data)
    {
        $model->active = (isset($data['active'])) ? 1 : 0;
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

    public function saveImage($model, $request, $folder)
    {
        if($request->hasFile('image')) {
            $file = $request->file('image');
            
            $path = Storage::disk('public')
                ->put(env('THEME') . '/images/' . $folder, $file);
            
            if($model->image && $file) {
                $this->deleteImage($model->image);
            }

            $model->image = $path;
            $model->save();
        }
    }

    public function deleteImage($file)
    {
        Storage::disk('public')->delete($file);
    }
}