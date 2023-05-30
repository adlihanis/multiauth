<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appliance; // Assuming you have an Appliance model
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Stripe\Checkout\Session;
use Stripe\Stripe;

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
    $url = route('application.show', ['id' => $id]); //kena edit
    $qrCode = QrCode::generate($url);
    $filename = Str::random(10) . '.svg';
    Storage::disk('public')->put($filename, $qrCode);
    
    // Check if the user has the required role or is the owner of the application
    if (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->id == $appliance->user_id) {
        return view('application', compact('appliance','url' ,'filename','qrCode'));
    }
    
    // If the user doesn't have the required role or ownership, you can redirect or display an error message
    // For example:
    return redirect()->back()->with('error', 'You are not authorized to view this page.');
    
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

public function __construct()
{
    $this->middleware('auth');
}
public function checkout($id)
{
    $appliance = Appliance::find($id);
    $totalPrice = $appliance->totalPrice;

    Stripe::setApiKey(env('STRIPE_SECRET'));
    // Create a new Stripe Checkout Session
    $session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [
            [
                'price_data' => [
                    'currency' => 'myr',
                    'product_data' => [
                        'name' => 'Please Pay This Amount to Proceed',
                    ],
                    'unit_amount' => $totalPrice * 100, // The price in cents
                ],
                'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'success_url' => route('checkout.success', ['id' => $id]),
        'cancel_url' => route('checkout.cancel', ['id' => $id]),
    ]);

    $appliance->payment_status = 'pending';
    $appliance->save();

    // Redirect the user to the Stripe Checkout page
    return redirect($session->url)->with('appliance', $appliance)->with('sessionId', $session->id);
}

public function success($id)
{
    // Handle successful payment

    // Retrieve the appliance from the database based on the ID if needed
    $appliance = Appliance::find($id);
    $appliance = session('appliance');
    $sessionId = session('sessionId');

    // Verify the session with Stripe to ensure the payment was successful
    Stripe::setApiKey(env('STRIPE_SECRET'));
    $session = Session::retrieve($sessionId);

    if ($session->payment_status === 'paid') {
        // Update the payment_status to successful
        $appliance->payment_status = 'successful';
        $appliance->save();
    } else {
        // Handle payment failure or other error scenarios
        // You can redirect to an error page or take appropriate action here
    }

    // Clear the session data
    session()->forget(['appliance', 'sessionId']);

    // Redirect to a success page or perform any other necessary actions
    // ...

    return redirect('status')->with('appliances', $appliance);
}

public function cancel($id)
{
    // Handle cancelled payment

    // Retrieve the appliance from the database based on the ID if needed
    $appliance = Appliance::find($id);

    return view('cancel')->with('appliance', $appliance);
}



}