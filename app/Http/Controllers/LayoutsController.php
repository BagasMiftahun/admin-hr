<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayoutsController extends Controller
{
    public function index(){
        return view('layouts.index',[
            'title'=>'Dashboard'
        ]);
    }
    

}
