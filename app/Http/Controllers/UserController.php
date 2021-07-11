<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $this->authorize('view', $users);

        return view( 'user-overview', [
            'users' => $users,
            'loggedInUser' => auth()->user(),
        ] );
    }

    public function edit($id)
    {
        $user = User::find( $id );
        $this->authorize('view', $user);

        return view( 'user-detail', [
            'user' => $user,
        ] );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find( $id );
        $this->authorize('update', $user);
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
