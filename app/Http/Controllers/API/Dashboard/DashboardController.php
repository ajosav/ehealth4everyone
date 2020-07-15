<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'verified']);
    }

    public function index() {
        if(request()->wantsJson()) {
            return $this->success('welcome to dashboard');
        }
    }
}
