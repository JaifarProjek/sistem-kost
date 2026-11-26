<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'penghuni_id',
        'bulan_tagihan',
        'jumlah_bayar',
        'tanggal_bayar',
        'status_bayar',
        'bukti_bayar',
    ];

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class, 'penghuni_id');
    }
}