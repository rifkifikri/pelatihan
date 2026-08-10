<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with('statusPengajuan')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('pengguna.pengajuan.index', compact('pengajuans'));
    }

    public function create()
    {
        return view('pengguna.pengajuan.create');
    }

    public function store(Request $request)
    {
    
        $validated = $request->validate([

            'kota'=>'required',
            'tanggal_pengajuan'=>'required|date',
            'nama_pemohon'=>'required',
            'jabatan'=>'required',
            'nomor_ktp'=>'required',
            'alamat'=>'required',
            'nomor_kontak'=>'required',

            'merk_produk'=>'required',
            'nama_produk'=>'required',
            'deskripsi_produk'=>'required',
            'bahan_baku'=>'required',
            'foto_produk'=>'nullable|image|max:2048',

        ]);

        if($request->hasFile('foto_produk')){
            $validated['foto_produk']=$request
                ->file('foto_produk')
                ->store('produk','public');
        }
        $validated['user_id']=auth()->id();
        $validated['nomor_pengajuan']='PJG-'.date('YmdHis');
        $validated['status_pengajuan_id']=1;
        Pengajuan::create($validated);
        return redirect()
            ->route('pengguna.pengajuan.index')
            ->with('success','Pengajuan berhasil disimpan.');
    }

        public function show(Pengajuan $pengajuan)
        {
            return view('pengguna.pengajuan.show', compact('pengajuan'));
        }    

        public function edit(Pengajuan $pengajuan)
        {
            return view('pengguna.pengajuan.edit', compact('pengajuan'));
        }

        public function update(Request $request, Pengajuan $pengajuan)
        {
            $validated = $request->validate([
                'kota' => 'required',
                'tanggal_pengajuan' => 'required|date',
                'nama_pemohon' => 'required',
                'jabatan' => 'required',
                'nomor_ktp' => 'required',
                'alamat' => 'required',
                'nomor_kontak' => 'required',
                'merk_produk' => 'required',
                'nama_produk' => 'required',
                'deskripsi_produk' => 'required',
                'bahan_baku' => 'required',
                'foto_produk' => 'nullable|image|max:2048',
            ]);

            if ($request->hasFile('foto_produk')) {
                $validated['foto_produk'] = $request
                    ->file('foto_produk')
                    ->store('produk', 'public');
            }
            $pengajuan->update($validated);
            return redirect()
                ->route('pengguna.pengajuan.index')
                ->with('success', 'Data berhasil diperbarui.');
        }

        public function destroy(Pengajuan $pengajuan)
        {
            if ($pengajuan->foto_produk) {
                Storage::disk('public')->delete($pengajuan->foto_produk);
            }
            $pengajuan->delete();
            return redirect()
                ->route('pengguna.pengajuan.index')
                ->with('success', 'Data berhasil dihapus.');
        }

}