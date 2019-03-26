<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\news;
use App\User;
use App\Event;

class IndexController extends Controller
{
    
    public function index(){
    	$news = news::with('user')
                ->orderBy('created_at','desc')
    			->simplePaginate(5);

        $events = event::with('user')
                ->orderBy('when','desc')
                ->orderBy('time','desc')
                ->simplePaginate(5);
    	return view('index', compact('news'), compact('events'));
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