<?php

namespace App\Http\Controllers\API;

use App\Models\Update;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function getLatestVersion()
    {
        $getUpdate = Update::all()->first();
        return response()->json([
            'status' => true,
            'data' => $getUpdate
        ], 200);
    }
}
