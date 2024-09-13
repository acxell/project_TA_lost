<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class PesanPerbaikan extends Model
{
    use HasFactory, Notifiable, HasUuids, HasRoles;

    protected $table = "pesan_perbaikans";

    protected $fillable = [
        'pesan'
    ];

    protected $attributes = [
        'status' => 'Belum Diajukan',
    ];


    //Relational
    public function rab(){
        return $this->belongsTo(Rab::class, 'rab_id', 'id');
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
