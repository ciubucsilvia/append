<?php

namespace App\Http\Controllers\Append\Admin;

class IndexController extends AdminController
{
    public function __construct()
    {
       parent::__construct(); 
    }

    public function index()
    {
        return $this->renderOutput();
    }
}
