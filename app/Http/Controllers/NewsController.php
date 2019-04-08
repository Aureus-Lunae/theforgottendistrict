<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\news;
use Illuminate\Http\Request;

class NewsController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		abort(404);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('news.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(NewsRequest $request) {
		$news = new news();

		$news->title = request('title');
		$news->news = request('news');
		$news->user_id = auth()->user()->id;

		$news->save();
		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		abort(404);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$news = news::find($id);

		return view('news.edit', compact('news'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(NewsRequest $request, $id) {
		$news = news::find($id);
		$news->title = request('title');
		$news->news = request('news');

		$news->save();
		return redirect('/');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		news::destroy($id);
		return redirect('/');
	}
}
