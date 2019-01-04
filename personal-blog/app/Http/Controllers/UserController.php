<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Comment;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function comments()
    {
        return view('user.comments');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function profilePost(UserRequest $request)
    {
        $user = Auth::user();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        if ($request['password'] != "") {
            if (!(Hash::check($request['password'], Auth::user()->password))) {
               return redirect()->back()->with('error', 'New password does not match with the old password');
            }

            if (strcmp($request['password'], $request['new_password']) == 0) {
                return redirect()->back()->with('error', 'Old and new password cannot be the same');
            }

            $validation = $request->validate([
                'password' => 'required',
                'new_password' => 'required|string|min:6|confirmed'
            ]);

            $user->password = bcrypt($request['new_password']);
            $user->save();

            return redirect()->back()->with('success', 'Password successfully changed!');
        }

        return back();
       
    }

    public function deleteComment($id)
    {
        Comment::where('id', $id)->where('user_id', Auth::id())->delete();
        return back();
    }
}
