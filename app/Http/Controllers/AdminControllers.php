<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;

class AdminControllers extends Controller
{
    public function Login()
    {
        return view('Admin-Login');
    }


public function CheckLogin(Request $request)
{
    // Validate the form inputs
    $request->validate([
        'admin_name' => 'required|string|max:255',
        'password' => 'required|string|min:4',
    ], [
        'admin_name.required' => 'Please enter your admin name.',
        'password.required' => 'Please enter your password.',
        'password.min' => 'Password must be at least 4 characters.',
    ]);

    // Check the database
    $admin = Admin::where('name', $request->input('admin_name'))
        ->where('password', $request->input('password'))
        ->first();

    if (!$admin) {
        return back()
            ->withErrors(['login' => 'Invalid admin name or password.'])
            ->withInput($request->only('admin_name'));
    }

    // Display the admin name after successful login
    Session::put('admin',$admin);
    return redirect('dashboard');
}

public function dashboard()
{
    if (!Session::has('admin')) {
        return redirect('/Admin-Login');
    }

    return view('admin', [
        'name' => Session::get('admin')
    ]);
}

}