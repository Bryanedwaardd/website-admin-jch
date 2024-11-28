<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Enums\EventInfoSourceEnum;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::all();
        return view('registrations.index', compact('registrations'));
    }

    public function create()
    {
        $eventInfoSources = EventInfoSourceEnum::labels();
        return view('registrations.create', compact('eventInfoSources'));
    }
    public function store(Request $request)
    {
    
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'business_location' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'event_info_source' => 'required|string',
        ]);
        
        // Create the registration
        Registration::create($validated);
    
        return redirect()->route('home')->with('success', 'Anda berhasil mendaftar untuk acara!');
    }

    public function edit($id)
    {
        $registration = Registration::findOrFail($id);
        return view('registrations.edit', compact('registration'));
    }

    public function update(Request $request, $id)
    {
        $registration = Registration::findOrFail($id);
        $registration->update($request->all());

        return redirect()->route('registrations.index')->with('message', 'Registration updated successfully');
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('registrations.index')->with('message', 'Registration deleted successfully');
    }


    
}
