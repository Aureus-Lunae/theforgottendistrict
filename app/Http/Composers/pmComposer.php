<?php

namespace App\Http\Composers;

use App\PM;
use Auth;
use Illuminate\View\View;

class pmComposer {

	/**
	 * Create a new profile composer.
	 *
	 * @param  UserRepository  $users
	 * @return void
	 */

	protected $countPM;

	public function __construct() {
		// Dependencies automatically resolved by service container...

		if (Auth::guest()) {
			$this->countPM = 0;
		}

		if ($user = Auth::user()) {
			$this->countPM = PM::where('receiver_id', '=', auth()->user()->id)
				->where('read', '=', false)
				->count();
			if ($this->countPM > 99) {
				$this->countPM = 99;
			}
		}
	}

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */

	public function compose(View $view) {
		$view->with('countPM', $this->countPM);
	}
}