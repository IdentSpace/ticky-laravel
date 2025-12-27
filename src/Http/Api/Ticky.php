<?php
namespace IdentSpace\Ticky\Http\Api;

use IdentSpace\Ticky\Services\RecordService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Ticky
{
    static public function newRecord(Request $request)
    {
        $data = $request->all();
        try {

            $validator = Validator::make($data, [
                'start' => 'required',
                'locked' => 'boolean'
            ]);

            if($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ],422);
            }

            // TODO: Auth id
            $data['user_id'] = 1;

            $record = RecordService::create($data);

            return response()->json($record);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 400);
        }
    }

    static public function getRecords(Request $request)
    {

    }
}