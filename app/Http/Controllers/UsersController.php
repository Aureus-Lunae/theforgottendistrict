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
    $this->middleware('verified');
    $this->middleware('role:6')->except('index','show', 'deleteAvatar');
    $this->middleware('role:5')->only('deleteAvatar');
  }

  public function index()
  {
    $users = user::orderBy('name','asc')
    												->Paginate(20);
    return view('users.index', compact('users'));
  }

  public function create()
  {
    abort(404);
  }

  public function store()
  {
    abort(404);
  }

  public function delete($id)
  {
    abort(404);
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

  public function edit($id)
  {
    $user = user::find($id);

    return view('users.edit', compact('user'));
  }

  public function update(Request $request, $id)
  {
    $user = user::find($id);
    $user->desc = $request->get('descr');

    if ( $request->has('staff') ) {
      $user->staff = 1;
    } else {
      $user->staff = 0;
    }

    if ( $request->has('builder') ) {
      $user->builder = 1;
    } else {
      $user->builder = 0;
    }

    if ( $request->has('event') ) {
      $user->event = 1;
    } else {
      $user->event = 0;
    }

    $user->rank = $request->get('rank');

    if ($request->get('rank') > 3 ) {
      $user->staff = 1;
    }

    $user->save();

    return redirect('/users/' . $id);
  }
}
