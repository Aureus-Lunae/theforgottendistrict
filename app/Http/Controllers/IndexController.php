<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\news;

class IndexController extends Controller
{
    
    public function index(){
    	$news = news::orderBy('created_at','desc')
    							->take(10)
    							->get();
    	return view('index', compact('news'));
    }
}
