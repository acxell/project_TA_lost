<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use PhpParser\Node\Expr\FuncCall;
use Spatie\Permission\Traits\HasRoles;

class Aktivitas extends Model
{
    use HasFactory, Notifiable, HasUlids, HasRoles;

    protected $table = "aktivitas";

    protected $fillable = [
        'kegiatan_id',
        'waktu',
        'penjelasan',
        'kategori_id',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(kategoriAktivitas::class, 'kategori_id', 'id');
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
