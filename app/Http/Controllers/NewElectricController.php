<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Electric;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

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
    $validatedData = $request->validate([
        'image' => 'required|image',
        'item' => 'required|string',
        'description' => 'required|string',
        'rate' => 'required|numeric',
    ]);
    $input = $request->all();
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('image'), $imageName);

        // Save the filename in the database
        $input['image'] = $imageName;
    }

    Electric::create($input);

    return redirect('newElectric')->with('flash.banner', 'New Electric being created!');
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
    
        $rules = [
            'image' => 'image',
            'item' => 'required',
            'description' => 'required',
            'rate' => 'required|numeric',
        ];
    
        $messages = [
            'image.image' => 'The image must be a valid image file.',
            'item.required' => 'The item name is required.',
            'description.required' => 'The description is required.',
            'rate.required' => 'The rate is required.',
            'rate.numeric' => 'The rate must be a number.',
        ];
    
        $validator = Validator::make($input, $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $imageName);
    
            // Update the filename in the database
            $input['image'] = $imageName;
        }
    
        $electric->update($input);
    
        return redirect('newElectric')->with('flash.banner', 'Electrical Appliances Updated!');
    }
    

    
    public function destroy(string $id): RedirectResponse
    {
        Electric::destroy($id);
        return redirect('newElectric')->with('flash.banner', 'Electrical Appliances deleted!');
    }
}