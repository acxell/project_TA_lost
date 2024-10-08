<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class kebutuhanAnggaran extends Model
{
    use HasFactory, Notifiable, HasUuids, HasRoles;

    protected $table = "aktivitas";

    protected $fillable = [
        'aktivitas_id',
        'uraian_aktivitas',
        'frekwensi',
        'nominal_volume',
        'satuan_volume',
        'jumlah',
    ];

    public function aktivitas()
    {
        return $this->belongsTo(Aktivitas::class, 'aktivitas_id', 'id');
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
