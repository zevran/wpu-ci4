<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-3">Detail Komik</h2>
            <div class="card mb-3 mt-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $isi_komik['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $isi_komik['judul']; ?></h5>
                            <p class="card-text"><?= $isi_komik['penulis']; ?></p>
                            <p class="card-text"><small class="text-body-secondary"><?= $isi_komik['penerbit']; ?></small></p>
                            <a href="/komik/edit/<?= $isi_komik['slug']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/komik/<?= $isi_komik['id']; ?>" method="post" class="d-inline">
                                <!-- agar terhindar dari serangan cross attack -->
                                <?= csrf_field(); ?>
                                <!-- membuat http method spoofing (method post akan digantikan dengan DELETE) -->
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus??');">Delete </button>
                            </form>
                            <br><br>
                            <a href="/komik">Kembali ke daftar Komik</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>