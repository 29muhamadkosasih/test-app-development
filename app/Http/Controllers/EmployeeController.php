<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $data = Employees::latest()->get();
        return view('pages.employee.list-employee', compact('data'));
    }

    public function create(Request $request) {
        $request->validate([
            'employee_id' => 'required|unique:employees',
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|email',
            'phone' => 'required',
            'start_date' => 'required|date',
            'role' => 'required',
            'image' => 'required|image|max:1024|mimes:jpeg,png,jpg,',
        ]);
        
        try {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'employee_id' => $request->employee_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'start_date' => date('Y-m-d', strtotime($request->start_date)),
                'role' => $request->role,
                'image' => $imageName,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'instagram' => $request->instagram
            ];

            Employees::create($data);
            return redirect()->back()->with('success', 'Berhasil membuat Employee!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', 'Gagal membuat Employee! '. $th->getMessage());
        }
    }
}
