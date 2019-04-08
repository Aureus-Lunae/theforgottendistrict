<?php

namespace App\Http\Controllers;

use App\PM;
use App\User;
use Illuminate\Http\Request;

class PMController extends Controller {

	public function __construct() {
		$this->middleware('auth');
		$this->middleware('verified');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index() {
		$received = PM::with('sender')
			->where('receiver_id', '=', auth()->user()->id)
			->orderBy('created_at', 'desc')
			->simplePaginate(20, ['*'], 'received');

		return view('profile.pm.index', compact('received'));
	}

	public function Outgoing() {
		$sent = PM::with('receiver')
			->where('sender_id', '=', auth()->user()->id)
			->orderBy('created_at', 'desc')
			->simplePaginate(20, ['*'], 'sent');

		return view('profile.pm.outgoing', compact('sent'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('profile.pm.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$receiver = User::where('username', '=', strtolower(request('receiver')))
			->first();

		if (!$receiver) {
			return redirect()->back()->with("error", "Nobody found with that username");
		}

		$pm = new PM();

		$pm->title = request('title');
		$pm->msg = request('msg');
		$pm->receiver_id = $receiver->id;
		$pm->sender_id = auth()->user()->id;

		$pm->save();
		return redirect('/dashboard/pm');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\PM  $pM
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		$pm = PM::with('sender')
			->with('receiver')
			->find($id);

		if ($pm->receiver_id == auth()->user()->id) {
			$pm->read = true;
			$pm->save();
		}

		return view('profile.pm.show', compact('pm'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\PM  $pM
	 * @return \Illuminate\Http\Response
	 */
	public function edit(PM $pm) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\PM  $pM
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, PM $pm) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\PM  $pM
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(PM $pm) {
		//
	}
}
