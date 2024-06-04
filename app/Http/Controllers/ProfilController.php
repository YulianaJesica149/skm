<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index');
    }

    public function edit(User $user, $id)
    {
        $user = User::select('id', 'password')->whereId($id)->firstOrfail();
        return view('profil.edit');
    }
    public function update_password(Request $request, User $user)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirm',

        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('message', 'Old password not match with your current password');
        }
        if ($request->new_password != $request->password_confirmation) {
            return back()->with('message', 'new password  and confirmation not match');
        }
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);
        return view("profil.index");
    }
}






    
            // $user = User::select('id', 'password')->whereId($id)->firstOrfail();
            //cek password lama
            // if (!Hash::check($request->old_password, $user->password)) {
                // return back()->with('error', 'password salah');
                // return back('')->with([
                //     Session::flash('error', 'gagal'),
                //     Session::flash('message', 'gagal Dihapus!')
                // ]);
                // return back()->with([
                //     'message' => 'gagal updated !',
                //     'alert-type' => 'info'
                // ]);
    // if ($request->new_password != $request->password_confirmation) {
        //     return back()->with('error', 'password tidak sama');
        //     return back('')->with([
        //         Session::flash('error', 'gagal'),
        //         Session::flash('message', 'gagal Dihapus gtu!')
        //     ]);
        //     return back()->with([
        //         'message' => 'gagal updated pass baru !',
        //         'alert-type' => 'info'
        //     ]);
        // }

        // $user->update(['passsword' => Hash::make($request->new_pasword)]);
        // return back()->with('status', 'Your password has been Updated');
