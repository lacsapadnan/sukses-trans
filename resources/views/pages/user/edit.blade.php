@extends('layouts.master')

@section('title', 'User')
@section('page-title', 'User List')
@section('breadcrumb', 'Edit User')

@section('content')
    <div class="card">
        <div class="pt-6 border-0 card-header">
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="required form-label">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukan nama user" required
                            value="{{ $user->name }}">
                    </div>
                    <div class="mb-6">
                        <label for="name" class="required form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukan email user" required
                            value="{{ $user->email }}">
                    </div>
                    <div class="mb-6">
                        <label for="name">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan password user">
                        <div class="text-muted">
                            Minimal 6 karakter dengan kombinasi huruf dan angka
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="name">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Masukan konfirmasi password user">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
