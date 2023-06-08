<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data</h2>
            <form action="/komik/update/<?= $isi_komik['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $isi_komik['slug']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $isi_komik['sampul']; ?>">
                <div class="row mb-3 mt-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <!-- class is-invalid adalah kelas bawaan bootstrap untuk membiuat inputan berwarna merah, kalau ingin warna hijau is-success, pesan eror di munculkan dengan operator ternary -->
                        <input type="text" class="form-control <?= isset($validation['judul']) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $isi_komik['judul'] ?>">
                        <!-- menampilkan pesan eror dalam feedback bootstrap -->
                        <div class="invalid-feedback">
                            <?= $validation['judul'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($validation['penulis']) ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $isi_komik['penulis'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation['penulis'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($validation['penerbit']) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $isi_komik['penerbit'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation['penerbit'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $isi_komik['sampul']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control img-sampul <?= isset($validation['sampul']) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation['sampul'] ?? '' ?>
                            </div>
                            <label class="input-group-text label-sampul" for="sampul">Upload</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>