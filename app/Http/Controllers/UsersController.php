<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Image;
use File;

class UsersController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $users = user::orderBy('name','asc')
    												->Paginate(20);
    return view('users.index', compact('users'));
  }

  public function show($id)
  {
    $user = user::find($id);

    return view('users.show', compact('user'));
  }

  public function deleteAvatar($id)
  {
    $user = user::find($id);
    if ($user->avatar != 'default.jpg')
    {
      $destinationPath = '/img/avatars/';
      File::delete(public_path($destinationPath . $user->avatar));
    }
    $user->avatar = 'default.jpg';
    $user->save();

    return redirect('/users/' . $id);
  }
}
