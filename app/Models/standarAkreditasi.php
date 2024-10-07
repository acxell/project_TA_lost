<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class standarAkreditasi extends Model
{
    use HasFactory, Notifiable, HasUuids, HasRoles;

    protected $table = "standar_akreditasis";

    protected $fillable = [
        'kode',
        'nama',
        'status',
    ];

    public function kegiatan ()
    {
        return $this->hasMany(Kegiatan::class, 'iku_id', 'id');
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
