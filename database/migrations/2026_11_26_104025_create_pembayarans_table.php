<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penghuni_id')->constrained('penghuni')->onDelete('cascade');
            $table->string('bulan_tagihan');
            $table->integer('jumlah_bayar');
            $table->date('tanggal_bayar')->nullable();
            $table->enum('status_bayar', ['belum_lunas', 'menunggu_verifikasi', 'lunas'])->default('belum_lunas');
            $table->string('bukti_bayar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};