<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Define the available projects with their types and display names
        $projects = [
            'uye' => 'UYE',
            'teka-teki' => 'TekaTeki',
            'veyoyee' => 'Veyoyee',
            'jobmatch' => 'JobMatch',
            'slide-market' => 'SlideMarket',
        ];

        // Pass the projects to the dashboard view
        return view('dashboard', compact('projects'));
    }
}
