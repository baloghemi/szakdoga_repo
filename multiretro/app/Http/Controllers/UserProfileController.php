<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
     
    public function profile() {
        return view('profile.userprofile');
    }

    public function send_to_modify($user_id) {
        $user = User::where('id', $user_id)->firstOrFail();
        return view('profile.modify_userprofile')->with('user', $user);
    }

    //adatok módosítása
    public function modify_profile(Request $request, $user_id) {
        $user = User::where('id', $user_id)->firstOrFail();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'neptun' => 'required|string|size:6'
        ]);
        $user->update($validated);

        return redirect()->route('userProfile', ['user_id' => $user->$user_id]);
    }
}
