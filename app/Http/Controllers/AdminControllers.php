<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;

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
    Session::put('admin',$admin->name);
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

public function categories()
{
    if (!Session::has('admin')) {
        return redirect('/Admin-Login');
    }

    $categories = DB::table('categories')->get();

    return view('categories', [
        'name' => Session::get('admin'),
        'categories' => $categories
    ]);
}


public function logout(){
return redirect('/Admin-Login');
Session::forget('admin');
}

public function AddCategories(Request $request)
{
    $request->validate([
    'Category' => 'required|string|max:50|unique:categories,name',
], [
    'Category.required' => 'Please enter a category name.',
    'Category.string' => 'Category must be text.',
    'Category.max' => 'Category name cannot exceed 50 characters.',
    'Category.unique' => 'This category already exists.',
]);

    $admin = Session::get('admin');

    $category = new Category();
    $category->name = $request->input('Category');
    $category->creater = $admin;

    if ($category->save()) {
        return redirect('/admin-categories')
            ->with('success', 'Category added successfully!');
    }

    return back()->with('error', 'Failed to save category.');
}
public function DeleteCategory($id)
{
    if (!Session::has('admin')) {
        return redirect('/Admin-Login');
    }

    $category = Category::findOrFail($id);
    $category->delete();

    return redirect('/admin-categories')
        ->with('success', 'Category deleted successfully!');
}

public function quiz()
{
    if (!Session::has('admin')) {
        return redirect('/Admin-Login');
    }

    $categories = Category::all();

    return view('quiz', [
        'name' => Session::get('admin'),
        'quizName' => request('quiz')
    ]);
}

public function AddQuiz(Request $request)
{
    try {
        $request->validate([
            'quiz_name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
        ]);

        $quiz = new Quiz();
        $quiz->name = $request->input('quiz_name');
        $quiz->category_id = $request->input('category_id');
        $quiz->creator = Session::get('admin');
        $quiz->save();

        return redirect('/admin-quiz')
            ->with('success', 'Quiz added successfully!');

    } catch (\Throwable $e) {
        return response()->make(
            '<pre>' . e($e->getMessage()) . '</pre>',
            500
        );
    }
}
}

