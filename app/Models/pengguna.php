<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class pengguna extends Model
{
    use HasFactory, Notifiable, HasUuids, HasRoles;

    protected $lable = "penggunas";

    protected $fillable = [
        'nama',
        'email',
        'password',
        'status',
        'nomor_rekening',
        'role',
        'unit_id',
    ];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
