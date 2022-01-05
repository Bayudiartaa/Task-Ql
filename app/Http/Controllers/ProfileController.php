<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function setting($id)
    {
        $profile = User::findOrFail($id);
        return view('profile.setting', compact('profile'));
    }

    public function changePassword(Request $request)
    {
        
    }
}
