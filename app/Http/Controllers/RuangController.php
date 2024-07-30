<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function ruang()
    {
        $title = "Data Ruangan";
        $ruang = Ruang::orderBy('nama_ruang', 'asc')->get();
        return view('ruang', compact('title', 'ruang'));
    }
    public function ruangStore(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ruang' => 'required|max:255',
            'deskripsi' => 'max:255',
        ]);
        Ruang::create($validatedData);
        return back()->withSuccess('Ruang Berhasil Ditambahkan');
    }
    public function ruangUpdate(Request $request, Ruang $ruang)
    {
        $rules = [
            'nama_ruang' => 'required|max:255',
            'deskripsi' => 'max:255',
        ];
        $validatedData = $request->validate($rules);
        $ruang->update($validatedData);
        return back()->withSuccess('Ruang Berhasil diubah');
    }
    public function ruangDestroy(Ruang $ruang)
    {
        $ruang->delete();
        return back()->withSuccess('Ruang Berhasil dihapus');
    }
}
