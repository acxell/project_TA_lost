<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Rab extends Model
{
    use HasFactory, Notifiable, HasUuids, HasRoles;

    protected $table = "rabs";

    protected $fillable = [
        'nama_kegiatan',
        'total_biaya',
        'biaya_terbilang',
        'tor_id',
        'status',
    ];

    protected $attributes = [
        'status' => 'Belum Diajukan',
    ];

// Relational
    public function tor(){
        return $this->belongsTo(Tor::class, 'tor_id', 'id');
    }

    public function pesan_perbaikan(){
        return $this->hasMany(PesanPerbaikan::class, 'pesanPerbaikan_id', 'id');
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
