<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $total_category = Category::count('id');
        $total_user = User::where('user_type', '!=', 'admin')->count('id');
        return view('dashboard', ['total_category' => $total_category, 'total_user' => $total_user]);
    }
}
