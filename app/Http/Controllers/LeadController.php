<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function storeInquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:10'],
            'phone' => ['nullable', 'string', 'max:50'],
            'company' => ['nullable', 'string', 'max:255'],
        ]);

        Inquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'source' => 'website',
            'status' => 'new',
        ]);

        Lead::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'source' => 'website',
            'message' => $validated['message'],
            'status' => 'new',
        ]);

        return redirect()->back()->with('success', 'Thanks! Our Athena AI assistant will contact you shortly.');
    }
}
