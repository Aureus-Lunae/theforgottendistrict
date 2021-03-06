<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadAvatarRequest;
use Auth;
use File;
use Hash;
use Illuminate\Http\Request;
use Image;

class UserController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function profile() {
		return view('profile.profile', array('user' => Auth::user()));
	}

	public function updateAvatar(UploadAvatarRequest $request) {

		if ($request->hasFile('avatar')) {

			$destinationPath = '/img/avatars/';
			$avatar = $request->file('avatar');

			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(null, 256, function ($constraint) {
				$constraint->aspectRatio();
			})
				->resizeCanvas(256, 256, 'center')
				->save(public_path($destinationPath . $filename));

			$user = Auth::user();
			if ($user->avatar != 'default.jpg') {
				File::delete(public_path($destinationPath . $user->avatar));
			}

			$user->avatar = $filename;
			$user->save();
		}

		return redirect('/profile');

	}

	public function showChangePasswordForm() {
		return view('auth.changePassword');
	}

	public function changePassword(Request $request) {
		if (!(Hash::check($request->get('currentPassword'), Auth::user()->password))) {
			return redirect()->back()->with("error", "Your current password does not match with the password you provided.");
		}

		if (strcmp($request->get('currentPassword'), $request->get('newPassword')) == 0) {
			//Current password and new password are same
			return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
		}

		if (strcmp($request->get('newPassword_confirmation'), $request->get('newPassword')) != 0) {
			//New Password and Confirm Password are not the same
			return redirect()->back()->with("error", "Confirm Password does not match with the New Password");
		}

		$validateData = $request->validate([
			'currentPassword' => 'required',
			'newPassword' => 'required|string|min:8|confirmed',
		]);

		//Change Password

		$user = Auth::user();
		$user->password = bcrypt($request->get('newPassword'));
		$user->save();

		return redirect()->back()->with("success", "Password changed successfully !");
	}

	public function showChangeDescrForm() {
		return view('profile.changeDescription');
	}

	public function changedescr(Request $request) {

		if (!(Hash::check($request->get('currentPassword'), Auth::user()->password))) {
			return redirect()->back()->with("error", "Your current password does not match with the password you provided.");
		}

		$validateData = $request->validate([
			'currentPassword' => 'required',
		]);

		//Change Password

		$user = Auth::user();
		$user->desc = $request->get('descr');
		$user->save();

		return redirect()->back()->with("success", "Description changed successfully !");
	}
}
