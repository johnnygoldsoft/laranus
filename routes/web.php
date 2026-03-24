<?php

use Illuminate\Support\Facades\Route;

// Return JSON for all requests that don't match API routes
Route::fallback(function () {
    return response()->json(['message' => 'Not Found'], 404);
});
