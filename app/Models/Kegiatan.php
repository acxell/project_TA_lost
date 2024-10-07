<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Permission\Traits\HasRoles;

class Kegiatan extends Model
{
    use HasFactory, Notifiable, HasUuids, HasRoles;

    protected $table = "kegiatans";

    protected $fillable = [
        'nama_kegiatan',
        'total_biaya',
        'biaya_terbilang',
        'proker_id',
        'status',
        'user_id',
        'unit_id',
        'coa_id',
        'iku_id',
    ];

    protected $attributes = [
        'status' => 'Belum Diajukan',
    ];

    // Relational
    public function proker()
    {
        return $this->belongsTo(ProgramKerja::class, 'proker_id', 'id');
    }

    public function pesan_perbaikan()
    {
        return $this->hasMany(PesanPerbaikan::class, 'kegiatan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'id');
    }
    
    public function pendanaan()
    {
        return $this->hasMany(Pendanaan::class, 'kegiatan_id', 'id');
    }

    public function unit()
    {
        return $this->hasOneThrough(Unit::class, Pengguna::class, 'id', 'id', 'user_id', 'unit_id');
    }

    public function lpj()
    {
        return $this->hasOne(Lpj::class, 'kegiatan_id', 'id');
    }

    public function aktivitas()
    {
        return $this->hasMany(Aktivitas::class, 'kegiatan_id', 'id');
    }

    public function kategoriAktivitas()
    {
        return $this->hasManyThrough(kategoriAktivitas::class, Aktivitas::class, 'id', 'id', 'kategori_id', 'aktivitas_id');
    }

    public function indikatorKegiatan()
    {
        return $this->hasMany(indikatorKegiatan::class, 'kegiatan_id', 'id');
    }

    public function outcomeKegiatan()
    {
        return $this->hasMany(outcomeKegiatan::class, 'kegiatan_id', 'id');
    }

    public function coa()
    {
        return $this->belongsTo(coa::class, 'coa_id', 'id');
    }

    public function standarAkreditasi()
    {
        return $this->belongsTo(standarAkreditasi::class, 'iku_id', 'id');
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
