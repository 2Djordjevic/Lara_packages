<?php

namespace Pdusan\SimpleBlog\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends BaseController
{

    public function index()
    {
        return view("{$this->view_prefix}blogs.index", ['posts'=>[]]);
    }

    public function create()
    {
        return view("{$this->view_prefix}blogs.create");
    }
}
