@extends('layouts.app')
@section('title', 'Login - SIM-KOST')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="fw-bold text-center mb-1">Login Sistem Kost</h4>
                <p class="text-muted text-center small mb-4">Masuk sebagai Admin atau Penghuni Kost</p>

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </form>

                <hr>
                <p class="text-center small mb-0">
                    Belum punya akun penghuni? <a href="{{ route('register') }}">Daftar di sini</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection