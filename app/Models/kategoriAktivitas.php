<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class kategoriAktivitas extends Model
{
    use HasFactory, Notifiable, HasUuids, HasRoles;

    protected $table = "kategori_aktivitas";

    protected $fillable = [
        'tahapan',
    ];

    public function aktivitas()
    {
        return $this->hasMany(Aktivitas::class, 'kategori_id', 'id');
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
