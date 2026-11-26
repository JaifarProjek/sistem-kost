<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';

    protected $fillable = [
        'nomor_kamar',
        'tipe_kamar',
        'harga_bulanan',
        'status',
        'fasilitas',
    ];

    public function penghuni()
    {
        return $this->hasMany(Penghuni::class, 'kamar_id');
    }
}