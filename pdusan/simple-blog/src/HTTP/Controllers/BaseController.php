<?php

namespace Pdusan\SimpleBlog\Http\Controllers;

use Illuminate\Routing\Controller;

class BaseController extends Controller
{

    protected $view_prefix;

    public function __construct()
    {
        $this->view_prefix = config('sblog.view_namespace') . '::';
    }
}
