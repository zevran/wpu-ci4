<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h3 class="mt-3">Daftar Komik</h3>
            <table class="table table-success table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><img src="/img/naruto.jpg" class="sampul"></td>
                        <td>Naruto</td>
                        <td><a href="" class="btn btn-info">Detail</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td><img src="/img/onepiece.jpg" class="sampul"></td>
                        <td>One Piece</td>
                        <td><a href="" class="btn btn-info">Detail</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>