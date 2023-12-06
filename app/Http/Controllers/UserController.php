<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function adminIndex()
    {
        $data_admin = User::where('role', 'admin')->get();

        return view('admin.master_data.admin', [
            'title' => 'Data Admin',
            'data_admin' => $data_admin,
        ]);
    }

    public function pembeliIndex()
    {
        $data_pembeli = User::where('role', 'pembeli')->get();

        return view('admin.master_data.pembeli', [
            'title' => 'Data Pembeli',
            'data_pembeli' => $data_pembeli,
        ]);
    }

    public function store(Request $request, $role)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'role' => 'in:admin,pembeli',
            'password' => 'required|min:6',
            'telp' => 'required|numeric',
            'rekening' => 'required|numeric',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required|numeric',
        ]);

        User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $role,
            'telp' => $request->telp,
            'rekening' => $request->rekening,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'join_date' => now(),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('data_' . $role)->with('success', 'Berhasil menambahkan ' . $request->role . ' baru.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'telp' => 'required|numeric',
            'role' => 'in:admin,pembeli',
            'rekening' => 'required|numeric',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('data_' . $request->role)->with('error', 'User tidak ditemukan.');
        }

        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->telp = $request->telp;
        $user->rekening = $request->rekening;
        $user->alamat = $request->alamat;
        $user->provinsi = $request->provinsi;
        $user->kota = $request->kota;
        $user->kode_pos = $request->kode_pos;

        if ($request->password) {
            $request->validate([
                'password' => 'min:6',
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('data_' . $request->role)->with('success', 'Berhasil mengupdate seorang ' . $request->role . '.');
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus seorang user');
    }
}
