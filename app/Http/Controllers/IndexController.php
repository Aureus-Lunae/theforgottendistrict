<?php

namespace App\Http\Controllers;

use App\Event;
use App\news;
use App\User;
use Carbon\Carbon;

class IndexController extends Controller {

	public function index() {
		$news = news::with('user')
			->orderBy('created_at', 'desc')
			->simplePaginate(3, ['*'], 'news');

		$events = event::with('user')
			->where('end', '>=', Carbon::now()->toDateString())
			->orderBy('end', 'asc')
			->orderBy('endtime', 'asc')
			->simplePaginate(3, ['*'], 'events');
		return view('index', compact('news'), compact('events'));
	}

	public function rules() {
		return view('rules');
	}

	public function staff() {
		$staff = User::where('staff', '1')
			->orderBy('rank', 'desc')
			->get();
		return view('staff', compact('staff'));
	}
}