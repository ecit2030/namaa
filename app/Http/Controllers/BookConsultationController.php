<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BookConsultationController extends Controller
{
    public function show(): Response
    {
        return Inertia::render('BookConsultation/Index', [
            'flash' => [
                'success' => session('success'),
            ],
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string', 'max:50'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        // TODO: send email / store enquiry if needed
        return back()->with('success', true);
    }
}
