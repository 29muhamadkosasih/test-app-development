<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $user = User::latest();
        $employee = Employees::latest();

        return view('pages.index', compact('user', 'employee'));
    }
}
