<?php
namespace IdentSpace\Ticky\Http\Api;

use Illuminate\Http\Request;
use IdentSpace\Ticky\Http\Controllers\SyncController;

class Sync
{
    static public function getPull(Request $request)
    {
        return response()->json(['pull' => []]);
    }

    static public function postPush(Request $request)
    {
        return response()->json(['push' => []]);
    }
}