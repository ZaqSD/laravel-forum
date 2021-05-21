<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view( 'user-overview', [
            'users' => User::all(),
            'loggedInUser' => auth()->user(),
        ] );
    }

    public function edit($id)
    {
        return view( 'user-detail', [
            'user' => User::find( $id ),
        ] );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find( $id );
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/user');
    }

    /**
 * Log the user out of the application.
 *
 * @param  \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}
}
