@extends('layouts.app')

@section('title', 'Ruangan')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Ruangan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">Data Master</li>
                    <li class="breadcrumb-item active" aria-current="page">Ruangan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <div class="row g-2 align-items-center">
                    <div class="col-12 col-md-6">
                        <h3 class="card-title">Ruangan ({{ $ruangan->count() }})</h3>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex flex-wrap justify-content-md-end gap-2">
                            <a href="{{ route('ruangan.create') }}" class="btn btn-sm btn-success">
                                <i class="bi bi-plus-circle me-1" aria-hidden="true"></i>
                                Tambah Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($status, ['aktif', 'nonaktif']) ? '' : 'active' }}"
                            href="{{ route('ruangan.index') }}">
                            Semua <span class="badge text-bg-light ms-1">{{ $jumlah['semua'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $status === 'aktif' ? 'active' : '' }}"
                            href="{{ route('ruangan.index', ['status' => 'aktif']) }}">
                            Aktif <span class="badge text-bg-light ms-1">{{ $jumlah['aktif'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $status === 'nonaktif' ? 'active' : '' }}"
                            href="{{ route('ruangan.index', ['status' => 'nonaktif']) }}">
                            Tidak aktif <span class="badge text-bg-light ms-1">{{ $jumlah['nonaktif'] }}</span>
                        </a>
                    </li>
                </ul>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Kapasitas</th>
                            <th>Status</th>
                            <th style="width: 100px">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ruangan as $item)
                            <tr class="align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kapasitas }}</td>
                                <td>
                                    @if ($item->status)
                                        <span class="badge text-bg-success">Aktif</span>
                                    @else
                                        <span class="badge text-bg-secondary">Tidak aktif</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('ruangan.edit', $item) }}"
                                            class="btn btn-outline-secondary"
                                            aria-label="Ubah {{ $item->nama }}">
                                            <i class="bi bi-pencil" aria-hidden="true"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger"
                                            data-bs-toggle="modal" data-bs-target="#modal-hapus"
                                            data-action="{{ route('ruangan.destroy', $item) }}"
                                            data-nama="{{ $item->nama }}"
                                            aria-label="Hapus {{ $item->nama }}">
                                            <i class="bi bi-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" aria-labelledby="modal-hapus-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-hapus" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-hapus-label">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">
                        Apakah Anda yakin ingin menghapus ruangan <strong id="nama-hapus"></strong>?
                        Tindakan ini tidak dapat dibatalkan.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('modal-hapus').addEventListener('show.bs.modal', function (event) {
        const tombol = event.relatedTarget;
        document.getElementById('form-hapus').action = tombol.getAttribute('data-action');
        document.getElementById('nama-hapus').textContent = tombol.getAttribute('data-nama');
    });
</script>
@endpush
@endsection