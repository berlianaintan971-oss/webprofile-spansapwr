<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::latest()->get();

        return view('admin.ekstrakurikuler.index', compact('ekstrakurikulers'));
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'pembina' => 'nullable|max:255',
            'jadwal' => 'nullable|max:255',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create([
            'nama' => $request->nama,
            'pembina' => $request->pembina,
            'jadwal' => $request->jadwal,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
        ]);

        return redirect()->route('ekstrakurikuler.index')
            ->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'pembina' => 'nullable|max:255',
            'jadwal' => 'nullable|max:255',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {

            if ($ekstrakurikuler->foto &&
                Storage::disk('public')->exists($ekstrakurikuler->foto)) {

                Storage::disk('public')->delete($ekstrakurikuler->foto);
            }

            $ekstrakurikuler->foto = $request->file('foto')
                ->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->nama = $request->nama;
        $ekstrakurikuler->pembina = $request->pembina;
        $ekstrakurikuler->jadwal = $request->jadwal;
        $ekstrakurikuler->deskripsi = $request->deskripsi;

        $ekstrakurikuler->save();

        return redirect()->route('ekstrakurikuler.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        if ($ekstrakurikuler->foto &&
            Storage::disk('public')->exists($ekstrakurikuler->foto)) {

            Storage::disk('public')->delete($ekstrakurikuler->foto);
        }

        $ekstrakurikuler->delete();

        return redirect()->route('ekstrakurikuler.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}