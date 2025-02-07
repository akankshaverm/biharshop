<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'full_name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'landmark' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'pincode' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'type' => 'required|string'

        ]);
        $validateData['user_id'] = Auth::id();

         Address::create($validateData);
        return redirect()->route('checkout');
    }
}
