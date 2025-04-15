<?php

namespace App\Http\Controllers\admin_vemoni;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Topic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalTopic = Topic::count();
        $totalStudent = Student::count();

        return view('admin_vemoni.dashboard', [
            'totalTopic' => $totalTopic,
            'totalStudent' => $totalStudent,
        ]);
    }
}
