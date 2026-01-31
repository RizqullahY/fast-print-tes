<form action="{{ route('product.store') }}" method="POST" data-winform="true">
    @csrf

    <div class="row">

        {{-- Nama Produk --}}
        <div class="mb-3 col-12 col-lg-6">
            <label class="form-label">Nama Produk</label>
            <div class="input-group input-group-sm input-group-merge">
                <span class="input-group-text"><i class="ti ti-package"></i></span>
                <input type="text"
                       class="form-control"
                       name="nama_produk"
                       required
                       minlength="3">
            </div>
        </div>

        {{-- Kategori --}}
        <div class="mb-3 col-12 col-lg-6">
            <label class="form-label">Kategori</label>
            <select class="form-select form-select-sm"
                    name="kategori_id"
                    required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $row)
                    <option value="{{ $row->id_kategori }}">
                        {{ $row->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Status --}}
        <div class="mb-3 col-12 col-lg-6">
            <label class="form-label">Status</label>
            <select class="form-select form-select-sm"
                    name="status_id"
                    required>
                @foreach ($status as $row)
                    <option value="{{ $row->id_status }}">
                        {{ $row->nama_status }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Harga --}}
        <div class="mb-3 col-12 col-lg-6">
            <label class="form-label">Harga</label>
            <div class="input-group input-group-sm input-group-merge">
                <span class="input-group-text"><i class="ti ti-tags"></i></span>
                <input type="number"
                       class="form-control"
                       name="harga"
                       min="0"
                       required>
            </div>
        </div>

        <div class="text-end">
            <button class="btn btn-sm btn-primary">Simpan</button>
        </div>

    </div>
</form>
