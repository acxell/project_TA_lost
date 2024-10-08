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
        'proker_id',
        'nama_kegiatan',
        'pic',
        'kepesertaan',
        'nomor_standar_akreditasi',
        'penjelasan_standar_akreditasi',
        'coa_id',
        'latar_belakang',
        'tujuan',
        'manfaat_internal',
        'manfaat_eksternal',
        'metode_pelaksanaan',
        'persen_dana',
        'biaya_keperluan',
        'dana_bulan_berjalan',
        'status',
        'user_id',
        'unit_id',
        'satuan_id',
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
        return $this->hasOneThrough(satuanKerja::class, Unit::class, Pengguna::class, 'id', 'id', 'id', 'user_id', 'unit_id', 'satuan_id');
    }

    public function lpj()
    {
        return $this->hasOne(Lpj::class, 'kegiatan_id', 'id');
    }

    public function aktivitas()
    {
        return $this->hasMany(Aktivitas::class, 'kegiatan_id', 'id');
    }

    public function kebutuhanAnggaran()
    {
        return $this->hasManyThrough(kebutuhanAnggaran::class, Aktivitas::class, 'id', 'id', 'kebutuhanAnggaran_id', 'aktivitas_id');
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

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
