<?php

namespace App\Http\Controllers;

use App\Models\Departements;
use Illuminate\Http\Request;

class DepartementsController extends Controller
{
    public function index() {
        $data = Departements::latest()->get();
        return view('pages.departements.list-departements', compact('data'));
    }

    public function create(Request $request) {
        $request->validate([
            'departements_name' => 'required|max:255',
            'departements_head' => 'required|max:255',
            'number_of_employee' => 'required|numeric'
        ]);
        try {
            Departements::create($request->all());
            return redirect()->back()->with('success', 'Berhasil membuat Departements!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', 'Gagal membuat Departements! '. $th->getMessage());
        }
    }
}
