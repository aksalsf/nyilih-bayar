<!-- Modal -->
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- Modal Title -->
                <h5 class="modal-title" id="modalTambahDataLabel">
                    Penerbit
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="modules/penerbit/tambah-penerbit.php" method="post">
                <!-- Modal Content -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_penerbit">Nama Penerbit</label>
                        <input type="text" name="nama_penerbit" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_penerbit">Kota Penerbit</label>
                        <input type="text" name="kota_penerbit" class="form-control" required>
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