<?php

namespace App\Http\Controllers;

use App\Http\Requests\pmRequest;
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
			->where('receiver_deleted', '=', false)
			->orderBy('created_at', 'desc')
			->simplePaginate(20, ['*'], 'received');

		return view('profile.pm.index', compact('received'));
	}

	public function Outgoing() {
		$sent = PM::with('receiver')
			->where('sender_id', '=', auth()->user()->id)
			->where('sender_deleted', '=', false)
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

		if (isset($_GET['user'])) {
			$receiver = user::find($_GET['user']);
			$to = $receiver->name;
			$id = $_GET['user'];
		} else {
			$to = $id = NULL;
		}

		return view('profile.pm.create')
			->with('receiver', $to)
			->with('userid', $id);
	}

	public function reply($id) {
		$pm = PM::with('sender')
			->find($id);

		return view('profile.pm.reply', compact('pm'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(pmRequest $request) {

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
		abort(404);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\PM  $pM
	 * @return \Illuminate\Http\Response
	 */
	public function update(pmRequest $request, PM $pm) {
		abort(404);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\PM  $pM
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(PM $pm) {

		if (auth()->user()->id == $pm->receiver_id) {
			$pm->receiver_deleted = true;
			$pm->save();
		}

		if (auth()->user()->id == $pm->sender_id) {
			$pm->sender_deleted = true;
			$pm->save();
		}

		if ($pm->sender_deleted && $pm->receiver_deleted) {
			PM::destroy($pm->id);
		}

		return redirect()->back()->with("Success", "PM deleted");
	}
}
