<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Assumes user is authenticated due to route middleware
        $user = auth()->user();

        return view('dashboard', [
            'user' => $user
        ]);
    }
}
