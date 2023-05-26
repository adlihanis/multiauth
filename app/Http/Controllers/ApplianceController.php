<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appliance; // Assuming you have an Appliance model
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class ApplianceController extends Controller
{
    public function store(Request $request)
    {
        $totalQuantity = $request->input('totalQuantity');
        $totalPrice = $request->input('totalPrice');
        $quantity1 = $request->input('quantity.1');
        $quantity2 = $request->input('quantity.2');
        $quantity3 = $request->input('quantity.3');
        $quantity4 = $request->input('quantity.4');
        $quantity5 = $request->input('quantity.5');
        $quantity6 = $request->input('quantity.6');
        $quantity7 = $request->input('quantity.7');
        $quantity8 = $request->input('quantity.8');
        $quantity9 = $request->input('quantity.9');


        // Save the totalQuantity and totalPrice to the database
        // You can create a new record or update an existing one, depending on your requirements

        // Example: Creating a new Appliance record
        $appliance = new Appliance();
        $appliance->approval_status = 'pending';
        $appliance->quantity1 = $quantity1;
        $appliance->quantity2 = $quantity2;
        $appliance->quantity3 = $quantity3;
        $appliance->quantity4 = $quantity4;
        $appliance->quantity5 = $quantity5;
        $appliance->quantity6 = $quantity6;
        $appliance->quantity7 = $quantity7;
        $appliance->quantity8 = $quantity8;
        $appliance->quantity9 = $quantity9;
        $appliance->totalQuantity = $totalQuantity;
        $appliance->totalPrice = $totalPrice;
        $appliance->user_id = auth()->user()->id;
        $appliance->save();

        // Redirect or return a response
        // You can redirect to a success page or return a JSON response, depending on your needs
        return redirect('/addelectric');
    }

    public function application()
{
    $role = Auth::user()->role;
    $search = '';
    if ($role == '2' || $role == '1') {
        $appliances = Appliance::where('approval_status', 'pending')->get();
    } else {
        $userId = auth()->user()->id;
        $appliances = Appliance::where('user_id', $userId)->where('approval_status', 'pending')->get();
    }

    return view('showlist', compact('appliances','search'));
}

public function destroy($id)
    {
        $appliance = Appliance::findOrFail($id);
        $appliance->delete();

        return redirect()->route('application')->with('success', 'Application deleted successfully.');
    }
public function delete($id)
{
    $appliance = Appliance::findOrFail($id);
    $appliance->delete();

    return redirect()->route('application')->with('success', 'Application deleted successfully.');
}
public function showAll()
{
    $appliances = Appliance::all();
    return view('application', compact('appliances'));
}

public function show($id)
{
    $appliance = Appliance::findOrFail($id);
    return view('application', compact('appliance'));
    
}
public function approve($id)
    {
        $appliance = Appliance::findOrFail($id);
        $appliance->approval_status = 'approved';
        $appliance->save();

        return redirect()->route('application')->with('success', 'Application approved successfully.');
    }
public function reject($id)
    {
        $appliance = Appliance::findOrFail($id);
        $appliance->approval_status = 'rejected';
        $appliance->save();

        return redirect()->route('application')->with('success', 'Application rejected successfully.');
    }
    public function status()
{
    $userId = auth()->user()->id;
    $userRole = auth()->user()->role;

    if ($userRole == 1) {
        $appliances = Appliance::where('approval_status', '!=', 'pending')->get();
    } else {
        $appliances = Appliance::where('user_id', $userId)->where('approval_status', '!=', 'pending')->get();
    }

    return view('status', compact('appliances'));
}

public function search(Request $request)
    {
        $search = $request->input('search');
        
        $appliances = Appliance::whereHas('user', function ($query) use ($search) {
            $query->where('name', 'like', "%$search%");
        })->get();

        return view('showlist', compact('appliances', 'search'));
    }
}