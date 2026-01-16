<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="title_modal">Modal Produk</h3>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body dark-modal">
                <form id="formData" onsubmit="return false;">
                    <div class="form-group mb-2">
                        <label for="nama">Nama Produk *</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" id="nama" name="nama" class="form-control"
                            placeholder="Masukkan Nama Produk ...">
                        <small class="text-danger pl-1" id="error-nama"></small>
                    </div>
                    <div class="form-group mb-2">
                        <label for="kategori">Nama Kategori *</label>
                        <select id="kategori" name="kategori" class="form-select">
                            <option value="">Pilih Kategori</option>
                            <option value="Kategori A">Kategori A</option>
                            <option value="Kategori B">Kategori B</option>
                            <option value="Kategori C">Kategori C</option>
                        </select>
                        <small class="text-danger pl-1" id="error-kategori"></small>
                    </div>
                    <div class="form-group mb-2">
                        <label for="harga">Harga *</label>
                        <input type="text" id="harga" name="harga" class="form-control maskRupiah"
                            placeholder="Masukkan Harga Produk ...">
                        <small class="text-danger pl-1" id="error-harga"></small>
                    </div>
                    <div class="form-group mb-2">
                        <label for="stok">Stok *</label>
                        <input type="text" id="stok" name="stok" class="form-control number-only"
                            placeholder="Masukkan Stok Produk ...">
                        <small class="text-danger pl-1" id="error-stok"></small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_tambah" onclick="tambah_data()">Simpan</button>
                <button type="button" class="btn btn-primary" id="btn_edit" onclick="edit_data()">Perbarui</button>
            </div>
        </div>
    </div>
</div>
