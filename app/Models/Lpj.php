<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Lpj extends Model
{
    use HasFactory, Notifiable, HasUuids, HasRoles;

    protected $table = "lpjs";

    protected $fillable = [
        'penjelasan_kegiatan',
        'jumlah_peserta_undangan',
        'jumlah_peserta_hadir',
        'proker_id',
        'kegiatan_id',
        'status',
        'user_id',
        'unit_id',
    ];

    protected $attributes = [
        'status' => 'Belum Diajukan',
    ];


    public function kegiatan()
    {
        return $this->belongsTo(kegiatan::class, 'kegiatan_id', 'id');
    }

    public function proker()
    {
        return $this->hasOneThrough(ProgramKerja::class, kegiatan::class, 'id', 'id', 'kegiatan_id', 'proker_id');
    }

    public function user()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'id');
    }

    public function unit()
    {
        return $this->hasOneThrough(Unit::class, Pengguna::class, 'id', 'id', 'user_id', 'unit_id');
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
