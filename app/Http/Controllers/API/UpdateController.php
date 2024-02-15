<?php

namespace App\Http\Controllers\API;

use App\Models\Update;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function getLatestVersion()
    {
        $getUpdate = Update::all()->first();
        $getUpdate['latest_version'] = $getUpdate['android_latest_version'];
        $getUpdate['url_update'] = $getUpdate['android_url_update'];
        return response()->json([
            'status' => true,
            'data' => $getUpdate
        ], 200);
    }
}
