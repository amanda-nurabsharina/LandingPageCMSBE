<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\AnalyticsEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'required|string',
            'session_id' => 'required|string|max:255',
        ]);

        // 1. Simpan data Lead baru
        $lead = Lead::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        // 2. Log event analytics untuk dashboard
        AnalyticsEvent::create([
            'event_type' => 'lead_submitted',
            'page_name' => 'Contact Form',
            'session_id' => $request->input('session_id'),
            'ip_address' => $request->ip(),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Pesan Anda berhasil terkirim. Admin kami akan segera menghubungi Anda!',
            'data' => $lead
        ]);
    }
}
