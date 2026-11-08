@extends('layouts.app')

@section('title', 'Ubah Ruangan')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Ubah Data Ruangan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">Data Master</li>
                    <li class="breadcrumb-item"><a href="{{ route('ruangan.index') }}">Ruangan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Form Ubah Ruangan</h3>
            </div>
            <form action="{{ route('ruangan.update', $ruangan) }}" method="POST" novalidate>
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('ruangan._form')
                </div>
                <div class="card-footer d-flex justify-content-end gap-2">
                    <a href="{{ route('ruangan.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1" aria-hidden="true"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1" aria-hidden="true"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection