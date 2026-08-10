
    <div class="space-y-8">
    <!-- DATA SURAT -->

    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-green-700 border-b border-green-200 pb-3 mb-6">
            Data Surat
        </h2>
        <div class="space-y-6">
            
            <!-- Kota -->
            <div>
                <label for="kota" class="block mb-2 text-sm font-medium text-gray-700">
                    Kota
                </label>
                <x-ui.input type="text" id="kota" name="kota" value="{{ old('kota') }}" placeholder="Contoh : Bandung" class="max-w-1/2"/>
            </div>
            <!-- Tanggal -->
            <div>
                <label for="tanggal_pengajuan" class="block mb-2 text-sm font-medium text-gray-700">
                    Tanggal Pengajuan
                </label>
                <x-ui.input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" value="{{ old('tanggal_pengajuan', now()->format('Y-m-d')) }}" class="max-w-1/5"/>
            </div>
        </div>
    </div>


    <!-- DATA PEMOHON -->
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-green-700 border-b border-green-200 pb-3 mb-6">
            Data Pemohon
        </h2>
        <div class="space-y-6">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Nama Pemohon
                </label>
                <x-ui.input type="text" name="nama_pemohon" value="{{ old('nama_pemohon') }}" class="max-w-1/2 uppercase"/>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Jabatan
                </label>
                <x-ui.input type="text" name="jabatan" value="{{ old('jabatan') }}" class="max-w-1/2 uppercase"/>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Nomor KTP
                </label>
                <x-ui.input type="text" name="nomor_ktp" value="{{ old('nomor_ktp') }}"  class="max-w-1/2 uppercase"/>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Alamat
                </label>
                <x-ui.textarea
                    name="alamat" rows="4" class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-green-600 focus:ring-0">{{ old('alamat') }}</x-ui.textarea>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Nomor Kontak
                </label>
                <x-ui.input type="text" name="nomor_kontak" value="{{ old('nomor_kontak') }}"  class="max-w-1/2 uppercase"/>
            </div>
        </div>

    </div>    
    
    <!-- DATA PRODUK -->
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-green-700 border-b border-green-200 pb-3 mb-6">
            Data Produk
        </h2>
        <div class="space-y-6">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Merk produk
                </label>
                <x-ui.input type="text" name="merk_produk" value="{{ old('merk_produk') }}"  class="max-w-1/2 uppercase"/>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Nama Produk
                </label>
                <x-ui.input type="text" name="nama_produk" value="{{ old('nama_produk') }}"  class="max-w-1/2 uppercase"/>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Deskripsi Produk
                </label>
                <x-ui.textarea name="deskripsi_produk" rows="4" class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-green-600 focus:ring-0">{{ old('deskripsi_produk') }}</x-ui.textarea>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">
                    Bahan Baku
                </label>
                <x-ui.textarea name="bahan_baku" rows="4" class="w-full rounded-lg border border-gray-300 px-4 py-3  focus:border-green-600 focus:ring-0">{{ old('bahan_baku') }}</x-ui.textarea>
            </div>
        </div>
    </div>    

    <!-- FOTO PRODUK -->
<div>

    <label for="foto_produk" class="block mb-2 text-sm font-medium text-gray-700">
        Foto Produk
    </label>

    <input type="file" id="foto_produk" name="foto_produk" accept="image/*" class="block w-full rounded-lg border border-gray-300 file:bg-green-600 file:text-white file:border-0 file:px-4 file:py-2 file:rounded-lg file:cursor-pointer focus:border-green-600 focus:ring-0">
    <div id="previewContainer" class="hidden mt-5">
        <p class="text-sm text-gray-600 mb-2">
            Tampilan Foto
        </p>
        <img id="previewImage" class="max-w-md rounded-lg border border-gray-200 shadow-sm">
    </div>
</div>   

<div class="flex justify-end gap-3">
      
    <a href="{{ route('pengguna.pengajuan.index') }}" >
            <x-ui.button variant="secondary" size="md">
                Batal
            </x-ui.button> 
    </a>
    <button type="submit">
            <x-ui.button variant="primary" size="md" type="submit">
                Simpan Pengajuan
            </x-ui.button> 
    </button>
</div>

</div>


<script>

document.getElementById('foto_produk').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;
    const preview = document.getElementById('previewImage');
    const container = document.getElementById('previewContainer');
    preview.src = URL.createObjectURL(file);
    container.classList.remove('hidden');
});

</script>