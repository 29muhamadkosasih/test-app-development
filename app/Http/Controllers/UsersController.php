<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $data = User::latest()->get();
        return view('pages.users.list-users', compact('data'));
    }

    public function create(Request $request) {
        // dd($request);
        $request->validate([
            'firstName' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required',
            'username' => 'required|unique:users',
            'employee_id' => 'required|unique:users',
        ]);
        try {

            $fullName = $request->firstName.' '.$request->lastName;
            $data = [
                'name' => $fullName,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'username' => $request->username,
                'employee_id' => $request->employee_id,
                'role' => $request->role
            ];
            // dd($data);
    
            User::create($data);
            return redirect()->back()->with('success', 'Berhasil membuat user!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', 'Gagal membuat user! '. $th->getMessage());
        }
    }
}
