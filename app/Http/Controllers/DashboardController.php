<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Inquiry;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $leadCount = Lead::count();
        $inquiryCount = Inquiry::count();
        $faqCount = Faq::count();
        $recentLeads = Lead::latest()->take(6)->get();

        return view('dashboard', compact('leadCount', 'inquiryCount', 'faqCount', 'recentLeads'));
    }

    public function faqs()
    {
        $faqs = Faq::latest()->get();

        return view('faqs', compact('faqs'));
    }

    public function storeFaq(Request $request)
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'category' => ['required', 'string', 'max:100'],
        ]);

        Faq::create([
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'category' => $validated['category'],
            'is_active' => true,
        ]);

        return redirect()->route('faqs')->with('success', 'FAQ added.');
    }

    public function leads()
    {
        $leads = Lead::latest()->paginate(15);

        return view('leads', compact('leads'));
    }
}
