<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;


class UserSettingsControllers extends Controller
{


    public function index()
    {
//    ambil user
        $user = auth()->user();


        return view("userSettings", compact("user"));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $valid = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        // jika validasi gagal
        if (!$valid) {
            return redirect()->back()->withErrors($valid);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'User settings updated successfully');
    }

    public function destroy()
    {
        $user = auth()->user();
        $user->delete();

        return redirect()->route('auth.login')->with('success', 'Account deleted successfully');
    }

    public function changePassword(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ], [
            'current_password.required' => 'Password saat ini diperlukan',
            'new_password.required' => 'Password baru diperlukan',
            'new_confirm_password.same' => 'Konfirmasi password baru harus sama dengan password baru',
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success', 'Password successfully changed');
    }

}
