<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $role=Auth::user()->role;

        if($role=='1')
        {
            return view('layouts.app');
        }
        else if($role=='2')
        {
            return view('layouts.app1');
        }
        else
        {
            return view('layouts.app2');
        }
    }
}
