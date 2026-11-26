<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pembayaran;
use App\Models\Penghuni;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $totalKamar = Kamar::count();
            $kamarTersedia = Kamar::where('status', 'tersedia')->count();
            $penghuniAktif = Penghuni::where('status_huni', 'aktif')->count();
            $menungguVerifikasi = Pembayaran::where('status_bayar', 'menunggu_verifikasi')->count();
            $belumLunas = Pembayaran::where('status_bayar', 'belum_lunas')->count();

            $tagihanPerluTindakan = Pembayaran::with(['penghuni.user', 'penghuni.kamar'])
                ->whereIn('status_bayar', ['belum_lunas', 'menunggu_verifikasi'])
                ->latest()
                ->take(5)
                ->get();

            return view('dashboard.admin', compact(
                'totalKamar',
                'kamarTersedia',
                'penghuniAktif',
                'menungguVerifikasi',
                'belumLunas',
                'tagihanPerluTindakan'
            ));
        }

        $penghuni = Penghuni::with(['kamar', 'pembayaran' => function ($query) {
            $query->latest();
        }])
            ->where('user_id', $user->id)
            ->where('status_huni', 'aktif')
            ->first();

        $tagihanBelumLunas = $penghuni
            ? $penghuni->pembayaran->where('status_bayar', 'belum_lunas')
            : collect();

        return view('dashboard.user', compact('penghuni', 'tagihanBelumLunas'));
    }
}