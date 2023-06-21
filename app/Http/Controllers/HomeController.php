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

    public function see()
    {
        $staffUsers = DB::table('users')->where('role', '2')->get();
        return view('admin.staffview', compact('staffUsers'));
    }
    public function destroyStaffUser(Request $request, $id)
    {
        // Find the staff user by ID
        $staffUser = User::findOrFail($id);

        // Delete the staff user
        $staffUser->delete();

        // Redirect to the appropriate page or perform any other actions
        return redirect()->back()->with('success', 'Staff user deleted successfully.');
    }
    public function seeAll()
    {
        $allUsers = DB::table('users')->get();
        $search = '';
        return view('admin.allview', compact('allUsers','search'));
    }
    public function destroyAllUser(Request $request, $id)
    {
        // Find the staff user by ID
        $allUser = User::findOrFail($id);

        // Delete the staff user
        $allUser->delete();

        // Redirect to the appropriate page or perform any other actions
        return redirect()->back()->with('success', 'Student user deleted successfully.');
    }

    public function seeAdmin()
    {
        $adminUsers = DB::table('users')->where('role', '1')->get();
        return view('admin.adminview', compact('adminUsers'));
    }
    public function destroyAdminUser(Request $request, $id)
    {
        // Find the staff user by ID
        $adminUser = User::findOrFail($id);

        // Delete the staff user
        $adminUser->delete();

        // Redirect to the appropriate page or perform any other actions
        return redirect()->back()->with('success', 'Admin user deleted successfully.');
    }
    public function seeStudent()
    {
        $studentUsers = DB::table('users')->where('role', '0')->get();
        return view('admin.studentview', compact('studentUsers'));
    }
    public function destroyStudentUser(Request $request, $id)
    {
        // Find the staff user by ID
        $studentUser = User::findOrFail($id);

        // Delete the staff user
        $studentUser->delete();

        // Redirect to the appropriate page or perform any other actions
        return redirect()->back()->with('success', 'Staff user deleted successfully.');
    }
    public function changeRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $role = $request->input('role');

        // Update the user's role based on the value provided
        switch ($role) {
            case '1':
                $user->role = 1;
                break;
            case '2':
                $user->role = 2;
                break;
            default:
                // Handle invalid role value
                return redirect()->back()->with('error', 'Invalid role value.');
        }

        $user->save();

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'User role updated successfully.');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
    
        // Perform validation
        if (strpos($search, '@') === false) {
            return back()->withErrors(['search' => 'Search input must contain the @ symbol.'])->withInput();
        }
    
        $allUsers = User::where('email', 'like', "%$search%")->get();
    
        $notFoundMessage = '';
    
        if ($allUsers->isEmpty()) {
            $notFoundMessage = 'No results found for the search term.';
        }
    
        return view('admin.allview', compact('allUsers', 'notFoundMessage', 'search'));
    }
}
