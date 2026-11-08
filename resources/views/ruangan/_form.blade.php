<div class="mb-3">
    <label for="kode" class="form-label">Kode</label>
    <input type="text" name="kode" id="kode"
        class="form-control @error('kode') is-invalid @enderror"
        value="{{ old('kode', $ruangan->kode ?? '') }}" placeholder="contoh: LAB-01">
    @error('kode')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" name="nama" id="nama"
        class="form-control @error('nama') is-invalid @enderror"
        value="{{ old('nama', $ruangan->nama ?? '') }}" placeholder="contoh: Lab Pemrograman 1">
    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="kapasitas" class="form-label">Kapasitas</label>
    <input type="number" name="kapasitas" id="kapasitas"
        class="form-control @error('kapasitas') is-invalid @enderror"
        value="{{ old('kapasitas', $ruangan->kapasitas ?? '') }}" placeholder="1 sampai 60">
    @error('kapasitas')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <input type="hidden" name="status" value="0">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" name="status" id="status" value="1"
            @checked(old('status', $ruangan->status ?? false))>
        <label class="form-check-label" for="status">Aktif</label>
    </div>
</div>