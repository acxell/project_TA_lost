<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class Permission extends Model
{
    use HasFactory, Notifiable, HasUuids, HasRoles;

    protected $table = "permissions";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'guard_name',
    ];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
    public static function bootUuidTrait()
        {
            static::creating(function ($model) {
                $model->keyType = 'string';
                $model->incrementing = false;

                $model->{$model->getKeyName()} = $model->{$model->getKeyName()} ?: (string) Str::orderedUuid();
            });
        }
}
