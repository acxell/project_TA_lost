<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    use HasFactory;

    protected $lable = "penggunas";

    protected $fillable = [
        'nama',
        'email',
        'password',
        'status',
        'nomor_rekening',
        'role',
        'unit_id',
    ];
}
