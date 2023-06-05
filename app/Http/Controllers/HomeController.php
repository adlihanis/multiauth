<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Electric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $studentSum = DB::table('users')->where('role', '0')->count();
        $staffSum = DB::table('users')->where('role', '2')->count();
        $adminSum = DB::table('users')->where('role', '1')->count();
        $blockDetails = DB::table('users')
                 ->select('block', DB::raw('COUNT(*) as count'))
                 ->groupBy('block')
                 ->get();
        $courseDetails = DB::table('users')
                ->select('course', DB::raw('count(*) as count'))
                ->groupBy('course')
                ->get();
        $roomDetails = DB::table('users')
                ->select('room', DB::raw('count(*) as count'))
                ->groupBy('room')
                ->get();

        $role=Auth::user()->role;

        if($role=='1')
        {
            return view('admin.dashboard', compact('studentSum', 'staffSum', 'adminSum', 'blockDetails', 'courseDetails','roomDetails'));
        }
        else if($role=='2')
        {
            return view ('staff.dashboard');
        }
        else
        {
            return view ('dashboard');
        }
    }

    public function application()
    {
        return view('application');
    }
    public function status()
    {
        return view('status');
    }

}
