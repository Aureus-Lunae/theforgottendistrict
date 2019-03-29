<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventsRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$upcomingEvents = event::with('user')
			->where('end', '>=', Carbon::now()->toDateString())
			->orderBy('end', 'asc')
			->orderBy('endtime', 'asc')
			->simplePaginate(5, ['*'], 'upcoming');

		$pastEvents = event::with('user')
			->where('end', '<', Carbon::now()->toDateString())
			->orderBy('end', 'asc')
			->orderBy('endtime', 'asc')
			->simplePaginate(5, ['*'], 'past');
		return view('events.index', compact('upcomingEvents'), compact('pastEvents'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('events.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(EventsRequest $request) {

		$event = new event();

		$event->title = request('title');
		$event->event = request('event');
		$event->user_id = auth()->user()->id;
		$event->when = request('date');
		$event->time = request('time');
		if (request('enddate')) {
			$event->end = request('enddate');
			$event->endtime = request('endtime');
		} else {
			$event->end = request('date');
			$event->endtime = request('time');
		}

		$event->save();
		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function show(Event $event) {
		abort(404);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Event $event) {
		return view('events.edit', compact('event'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function update(EventsRequest $request, Event $event) {
		$event->title = request('title');
		$event->event = request('event');
		$event->user_id = auth()->user()->id;
		$event->when = request('date');
		$event->time = request('time');
		if (request('enddate')) {
			$event->end = request('enddate');
			$event->endtime = request('endtime');
		} else {
			$event->end = request('date');
			$event->endtime = request('time');
		}

		$event->save();
		return redirect('/');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Event $event) {
		event::destroy($event->id);
		return redirect('/');
	}
}
