<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Unit extends Model
{
    use HasFactory, Notifiable, HasUuids, HasRoles;

    protected $table = "units";

    protected $fillable = [
        'nama',
        'description',
        'status',
    ];

    public function penggunas(){
        return $this->hasMany(pengguna::class, 'unit_id', 'id');
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
