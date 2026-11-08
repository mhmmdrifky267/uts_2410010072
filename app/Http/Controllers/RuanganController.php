<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->query('status');

        $query = Ruangan::orderBy('nama');

        if ($status === 'aktif') {
            $query->where('status', true);
        } elseif ($status === 'nonaktif') {
            $query->where('status', false);
        }

        $ruangan = $query->get();

        $jumlah = [
            'semua'    => Ruangan::count(),
            'aktif'    => Ruangan::where('status', true)->count(),
            'nonaktif' => Ruangan::where('status', false)->count(),
        ];

        return view('ruangan.index', compact('ruangan', 'status', 'jumlah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Ruangan::create($this->validated($request));

        return redirect()->route('ruangan.index')
            ->with('success', 'Data ruangan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruangan $ruangan)
    {
        return view('ruangan.edit', compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $ruangan->update($this->validated($request, $ruangan->id));

        return redirect()->route('ruangan.index')
            ->with('success', 'Data ruangan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();

        return redirect()->route('ruangan.index')
            ->with('success', 'Data ruangan berhasil dihapus.');
    }

    /**
     * Validasi input tambah dan ubah data.
     */
    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $data = $request->validate([
            'kode'      => ['required', 'string', 'max:10', Rule::unique('ruangan', 'kode')->ignore($ignoreId)],
            'nama'      => ['required', 'string', 'max:100'],
            'kapasitas' => ['required', 'integer', 'between:1,60'],
            'status'    => ['nullable', 'boolean'],
        ], [
            'required'        => ':attribute wajib diisi.',
            'max.string'      => ':attribute maksimal :max karakter.',
            'unique'          => ':attribute sudah digunakan, tidak boleh sama.',
            'integer'         => ':attribute harus berupa angka bulat.',
            'between.numeric' => ':attribute harus antara :min sampai :max.',
        ], [
            'kode'      => 'Kode',
            'nama'      => 'Nama',
            'kapasitas' => 'Kapasitas',
        ]);

        $data['status'] = $request->boolean('status');

        return $data;
    }
}