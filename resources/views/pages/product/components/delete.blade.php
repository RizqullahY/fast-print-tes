<form action="{{ route('product.destroy', $produk->id_produk) }}" method="POST" data-winform="true">
    @csrf
    @method('DELETE')

    <div class="row">

        <div class="mb-3 col-12 col-lg-6">
            <label class="form-label">Nama Produk</label>
            <div class="input-group input-group-sm input-group-merge">
                <span class="input-group-text"><i class="ti ti-package"></i></span>
                <input type="text" disabled
                       class="form-control"
                       name="nama_produk"
                       value="{{ old('nama_produk', $produk->nama_produk) }}"
                       required
                       minlength="3">
            </div>
        </div>

        <div class="mb-3 col-12 col-lg-6">
            <label class="form-label">Kategori</label>
            <select class="form-select form-select-sm" disabled
                    name="kategori_id"
                    required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $row)
                    <option value="{{ $row->id_kategori }}"
                        {{ $row->id_kategori == $produk->kategori_id ? 'selected' : '' }}>
                        {{ $row->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 col-12 col-lg-6">
            <label class="form-label">Status</label>
            <select class="form-select form-select-sm" disabled
                    name="status_id"
                    required>
                @foreach ($status as $row)
                    <option value="{{ $row->id_status }}"
                        {{ $row->id_status == $produk->status_id ? 'selected' : '' }}>
                        {{ $row->nama_status }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 col-12 col-lg-6">
            <label class="form-label">Harga</label>
            <div class="input-group input-group-sm input-group-merge">
                <span class="input-group-text"><i class="ti ti-tags"></i></span>
                <input type="number" disabled
                       class="form-control"
                       name="harga"
                       value="{{ old('harga', $produk->harga) }}"
                       min="0"
                       required>
            </div>
        </div>

        <div class="text-end">
            <button class="btn btn-sm btn-danger">HAPUS</button>
        </div>

    </div>
</form>
