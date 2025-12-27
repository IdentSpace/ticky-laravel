<?php

use Illuminate\Support\Facades\Route;
use IdentSpace\Ticky\Http\Api\Sync;
use IdentSpace\Ticky\Http\Api\Ticky;

// TODO: Records / Locations / Projects etc.
Route::get('/ticky/state', function(){
    return response()->json(['state' => 200, 'hello' => 'world']);
});

// TODO: Login / Logout etc.

Route::post('/ticky/record/create', [Ticky::class, 'newRecord']);
Route::get('/ticky/record/list', [Ticky::class, 'getRecords']);

Route::get('/ticky/sync/pull', [Sync::class, 'getPull']);
Route::post('/ticky/sync/push', [Sync::class, 'postPush']);