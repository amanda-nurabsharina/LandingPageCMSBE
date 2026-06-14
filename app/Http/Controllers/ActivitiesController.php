<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\JsonResponse;

class ActivitiesController extends Controller
{
    public function index(): JsonResponse
    {
        $activities = Activity::orderBy('created_at', 'desc')->get();
        return response()->json([
            'status' => 'success',
            'data' => $activities
        ]);
    }

    public function show(string $slug): JsonResponse
    {
        $activity = Activity::where('slug', $slug)->first();

        if (!$activity) {
            // Fallback to ID check
            $activity = Activity::find($slug);
        }

        if (!$activity) {
            return response()->json([
                'status' => 'error',
                'message' => 'Aktifitas tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $activity
        ]);
    }
}
