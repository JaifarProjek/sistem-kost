<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    protected $table = 'penghuni';

    protected $fillable = [
        'user_id',
        'kamar_id',
        'nik',
        'no_hp',
        'tanggal_masuk',
        'status_huni',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'penghuni_id');
    }
}