<?php
namespace IdentSpace\Ticky\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class TickyCategory extends Model
{
    public $incrementing = false;
    protected $table = 'ticky_categories';
    protected $fillable = ['uuid','user_id', 'name', 'note'];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }
}