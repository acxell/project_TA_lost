<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class ProgramKerja extends Model
{
    use HasFactory, Notifiable, HasUuids, HasRoles;

    protected $table = "program_kerjas";

    protected $fillable = [
        'nama',
        'deskripsi',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'id');
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'proker_id', 'id');
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
