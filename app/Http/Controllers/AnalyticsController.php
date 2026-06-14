<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'event_type' => 'required|string|in:page_view,click_wa,lead_submitted',
            'page_name' => 'nullable|string|max:255',
            'session_id' => 'required|string|max:255',
        ]);

        AnalyticsEvent::create([
            'event_type' => $request->input('event_type'),
            'page_name' => $request->input('page_name'),
            'session_id' => $request->input('session_id'),
            'ip_address' => $request->ip(),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Event logged successfully'
        ]);
    }
}
