<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Tor extends Model
{
    use HasFactory, Notifiable, HasUuids, HasRoles;

    protected $table = "tors";

    protected $fillable = [
        'nama_proker',
        'satuan_kerja',
        'unit_id',
        'pic',
        'status',
    ];

   /*  public function rab(){
        return $this->hasMany(rab::class, 'tor_id', 'id');
    } */

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function rab(){
        return $this->hasMany(Rab::class, 'tor_id', 'id');
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
