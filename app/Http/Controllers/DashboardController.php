<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Report;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        $users = count(User::whereNot('id', 1)->get());
        $articles = count(Article::all());
        $categories = count(Category::all());
        $reports = Report::all();
        return view('backend.pages.dashboard', compact('users', 'articles', 'categories', 'reports'));
    }

    public function userDashboard(): View
    {
        $userId = auth()->id();
        $totalReports = Report::where('user_id', $userId)->count();
        $acceptedReports = Report::where('user_id', $userId)->where('status', 'accepted')->count();
        $rejectedReports = Report::where('user_id', $userId)->where('status', 'rejected')->count();
        $data = [
            'totalReports' => $totalReports,
            'acceptedReports' => $acceptedReports,
            'rejectedReports' => $rejectedReports,
        ];
        $userPoints = auth()->user()->userPoints->point ?? 0;
        return view('backend.pages.user-dashboard', compact('data', 'userPoints'));
    }
}
