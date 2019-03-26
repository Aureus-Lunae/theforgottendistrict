<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\news;
use App\User;

class IndexController extends Controller
{
    
    public function index(){
    	$news = news::with('user')
                ->orderBy('created_at','desc')
    			->simplePaginate(5);
    	return view('index', compact('news'));
    }

    public function rules(){
    	return view('rules');
    }

    public function staff(){
    	$staff = User::where('staff', '1')
    							->orderBy('rank','desc')
    							->get();
    	return view('staff', compact('staff'));
    }
}