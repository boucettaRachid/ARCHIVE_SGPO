<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Users', ['users' => $users]);
    }

    public function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'user delete successfully.');
    }
}
