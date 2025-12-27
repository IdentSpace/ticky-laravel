<?php
namespace IdentSpace\Ticky\Http\Api;

use Illuminate\Http\Request;
use IdentSpace\Ticky\Services\SyncService;

class Sync
{
    static public function getPull(Request $request)
    {
        return response()->json(
            [
                'audit' => [],
                'categories' => [],
                'projects' => [],
                'customers' => [],
                'records' => []
            ]
        );
    }

    static public function postPush(Request $request)
    {
        $result = [];
        $payload = $request->all();

        $result['records'] = [
            'success_num' => 0,
            'error_num' => 0,
            'errors' => [
                'entry_id' => 'x-x-x-x',
                'message' => ''
            ],
        ];

        return response()->json($result, 200);
    }
}