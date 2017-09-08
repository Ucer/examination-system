<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicsController extends Controller
{
    public function create()
    {
        return view('dashboard.topics.create');
    }
}
