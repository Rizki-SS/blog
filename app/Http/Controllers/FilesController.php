<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:file-index', ['only' => ['index']]);
    }

    public function index()
    {
        return view("file-manager.index");
    }
}
