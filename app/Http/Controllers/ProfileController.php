<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile($id)
    {
        $user = User::findOrfail($id);
        return view('setting.profile', compact('user'));
    }

    public function changeProfile(Request $request, $id)
    {
        $user = User::findOrfail($id);
        if ($request->email === $user->email) {
            $is_valid_email = 'required';
        }else {
            $is_valid_email = 'required|unique:users,email';
        }
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
        }
        $request->validate([
            'name' => 'required',
            'email' => $is_valid_email,
            'image' => 'required',
            'password' => 'required',
        ]);
        if (Hash::check($request->password , $user->password ))
        {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $filename
            ]);
            return redirect()->back()->with('success','Profil berhasil diubah');
        } else {
            return redirect()->back()->with('error','Password Anda tidak sesuai');
        }
    }

    public function password()
    {
        $user = User::findOrfail(auth()->user()->id);
        return view('setting.password', compact('user'));
    }

    public function changePassword(Request $request, $id)
    {
    $request->validate([
            'new_password' => 'required|min:8|same:confirm-password|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-_]).{6,}$/',
        ]);
        $user = User::findOrfail($id);
        if (Hash::check($request->currentPassword , $user->password ))
        {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect()->back()->with('success','Password berhasil diubah');
        } else {
            return redirect()->back()->with('error','Password lama Anda tidak sesuai');
        }
    }

}
