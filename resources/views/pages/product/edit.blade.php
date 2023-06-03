@extends('layouts.master')

@section('title', 'Produk')
@section('page-title', 'Produk List')
@section('breadcrumb', 'Edit Produk')

@section('content')
    <div class="card">
        <div class="pt-6 border-0 card-header">
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="required form-label">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukan nama produk" required
                            value="{{ $product->name }}">
                    </div>
                    <div class="mb-6">
                        <label class="required form-label" for="textarea">Deskripsi</label>
                        <textarea name="description" class="form-control" placeholder="Masukan deskripsi" style="height: 100px"
                            value="{{ $product->description }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
