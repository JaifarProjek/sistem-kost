@extends('layouts.app')
@section('title', 'Dashboard Penghuni - SIM-KOST')

@section('content')
<h4 class="fw-bold mb-3">Dashboard Penghuni Kost</h4>

@if(!$penghuni)
    <div class="alert alert-info">
        <i class="bi bi-info-circle-fill me-2"></i>
        Akun Anda belum ditempatkan di kamar manapun. Silakan hubungi Admin Kost untuk aktivasi kamar.
    </div>
@else
    @if($tagihanBelumLunas->count() > 0)
        <div class="alert alert-danger d-flex align-items-center justify-content-between">
            <div>
                <i class="bi bi-bell-fill me-2"></i>
                <strong>Pengingat Tagihan:</strong> Anda memiliki <strong>{{ $tagihanBelumLunas->count() }} tagihan</strong> yang belum dibayar.
            </div>
            <a href="{{ url('/pembayaran') }}" class="btn btn-sm btn-danger">Bayar / Upload Bukti</a>
        </div>
    @endif

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white fw-bold">Informasi Kamar Anda</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <small class="text-muted d-block">Nomor & Tipe Kamar</small>
                    <strong>{{ $penghuni->kamar->nomor_kamar }} — {{ $penghuni->kamar->tipe_kamar }}</strong>
                </div>
                <div class="col-md-4 mb-2">
                    <small class="text-muted d-block">Tarif Bulanan</small>
                    <strong>Rp {{ number_format($penghuni->kamar->harga_bulanan, 0, ',', '.') }} / bulan</strong>
                </div>
                <div class="col-md-4 mb-2">
                    <small class="text-muted d-block">Tanggal Masuk</small>
                    <strong>{{ \Carbon\Carbon::parse($penghuni->tanggal_masuk)->format('d M Y') }}</strong>
                </div>
            </div>
            <hr>
            <small class="text-muted d-block">Fasilitas Kamar</small>
            <span>{{ $penghuni->kamar->fasilitas ?? '-' }}</span>
        </div>
    </div>
@endif
@endsection