<?php

namespace Sithu\UserAcl\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Show the form for changing password
     *
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm()
    {
        return view('sithu-useracl::user.changemypassword');
    }

    /**
     * Store a new password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateChangePassword(Request $request)
    {
        
        if (Hash::check($request->old_password, Auth::user()->password)) {
           $this->validate($request,
            [
            'old_password' => 'required|min:6',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password'
            ]);
        }
        else
        {
            $this->validate($request,
            [
            'old_password' => 'required|confirmed:' . Auth::user()->password,
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password'
            ]);
        }

        

        Auth::user()->password = bcrypt($request->password);

        Auth::user()->save();

        // alert()->success('Success', 'Password Changed');

        return redirect()->route('user.index');
    }
}
