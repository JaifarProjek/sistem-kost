@extends('layouts.app')
@section('title', 'Dashboard Admin - SIM-KOST')

@section('content')
<h4 class="fw-bold mb-3">Dashboard Pemilik / Admin Kost</h4>

@if($menungguVerifikasi > 0)
    <div class="alert alert-warning d-flex align-items-center justify-content-between">
        <div>
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Ada <strong>{{ $menungguVerifikasi }} pembayaran</strong> menunggu verifikasi Anda!
        </div>
        <a href="{{ url('/pembayaran') }}" class="btn btn-sm btn-warning fw-semibold">Cek Sekarang</a>
    </div>
@endif

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Total Kamar</div>
                <h3 class="fw-bold mb-0">{{ $totalKamar }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Kamar Tersedia</div>
                <h3 class="fw-bold text-success mb-0">{{ $kamarTersedia }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Penghuni Aktif</div>
                <h3 class="fw-bold text-primary mb-0">{{ $penghuniAktif }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Tagihan Belum Lunas</div>
                <h3 class="fw-bold text-danger mb-0">{{ $belumLunas }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-bold">Tagihan Terbaru yang Membutuhkan Perhatian</div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Penghuni</th>
                    <th>Kamar</th>
                    <th>Bulan Tagihan</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tagihanPerluTindakan as $item)
                    <tr>
                        <td>{{ $item->penghuni->user->name }}</td>
                        <td>{{ $item->penghuni->kamar->nomor_kamar }}</td>
                        <td>{{ $item->bulan_tagihan }}</td>
                        <td>Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $item->status_bayar === 'menunggu_verifikasi' ? 'bg-warning text-dark' : 'bg-danger' }}">
                                {{ str_replace('_', ' ', strtoupper($item->status_bayar)) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">Belum ada tagihan tertunggak atau menunggu verifikasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection