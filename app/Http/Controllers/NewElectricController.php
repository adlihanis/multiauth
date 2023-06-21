<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Electric;
use Illuminate\View\View;

class NewElectricController extends Controller
{

    public function electric ()
    {
        $electrics = Electric::all();
        return view ('electrical')->with('electrics', $electrics);
    }

    public function index(): View
    {
        $electrics = Electric::all();
        return view ('addelectric')->with('electrics', $electrics);
    }

 
    public function create(): View
    {
        return view('create');
    }

  
    public function store(Request $request): RedirectResponse
{
    $input = $request->all();
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('image'), $imageName);

        // Save the filename in the database
        $input['image'] = $imageName;
    }

    Electric::create($input);

    return redirect('newElectric')->with('flash_message', 'New Electric being created!');
}


    public function show(string $id): View
    {
        $electric = Electric::find($id);
        return view('show')->with('electrics', $electric);
    }

    public function edit(string $id): View
    {
        $electric = Electric::find($id);
        return view('edit')->with('electrics', $electric);
    }

    public function update(Request $request, string $id): RedirectResponse
{
    $electric = Electric::find($id);
    $input = $request->all();

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('image'), $imageName);

        // Update the filename in the database
        $input['image'] = $imageName;
    }

    $electric->update($input);

    return redirect('newElectric')->with('flash_message', 'Electrical Appliances Updated!');
}

    
    public function destroy(string $id): RedirectResponse
    {
        Electric::destroy($id);
        return redirect('newElectric')->with('flash_message', 'Electrical Appliances deleted!'); 
    }
}