<!-- Modal -->
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- Modal Title -->
                <h5 class="modal-title" id="modalTambahDataLabel">
                    Paket Sewa
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="modules/paket-sewa/tambah-paket.php" method="post">
                <!-- Modal Content -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="durasi">Durasi</label>
                        <input type="number" name="durasi" min="1" required placeholder="Durasi (Hari)" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="form-control" min="1000" step="500" required placeholder="Harga (Rupiah)">
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>