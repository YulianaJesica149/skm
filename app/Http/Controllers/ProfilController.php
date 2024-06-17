<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index');
    }


    public function edit($id)
    {

        $user = User::select('id', 'password')->whereId($id)->firstOrfail();
        return view('profil.edit');
    }

    public function update_password(Request $request, $id, User $user)
    {
        $request->validate([
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required|min:6',

        ]);
        $user = User::select('id', 'password')->whereId($id)->firstOrfail();
        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect("/profil")->with('success', 'Password berhasil diubah');
        } else {
            return back()->with('gagal', '<small class="text-danger">password saat ini salah</small>');
        }
    }
}
