<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
    public function index(): JsonResponse
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return response()->json([
            'status' => 'success',
            'data' => $news
        ]);
    }

    public function show(string $slug): JsonResponse
    {
        $newsItem = News::where('slug', $slug)->first();

        if (!$newsItem) {
            // Fallback to ID check in case it's numeric
            $newsItem = News::find($slug);
        }

        if (!$newsItem) {
            return response()->json([
                'status' => 'error',
                'message' => 'Berita tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $newsItem
        ]);
    }
}
