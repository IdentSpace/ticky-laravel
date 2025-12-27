<?php
namespace IdentSpace\Ticky\Services;

use IdentSpace\Ticky\Models\TickyRecord;

class RecordService
{
    static public function create(array $data)
    {
        $record = new TickyRecord($data);
        return $record->save($data);
    }
}