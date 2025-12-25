<?php

use Illuminate\Support\Facades\Route;
use IdentSpace\Ticky\Http\Api\Sync;

// TODO: Records / Locations / Projects etc.
Route::get('/ticky/state', function(){
    return response()->json(['state' => 200, 'hello' => 'world']);
});

Route::get('/ticky/sync/pull', [Sync::class, 'getPull']);
Route::post('/ticky/sync/push', [Sync::class, 'pushPost']);