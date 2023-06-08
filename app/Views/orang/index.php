<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h3 class="mt-3">Daftar Orang</h3>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan keyword pencarian" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <table class="table table-success table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ubah looping sesuai dengan currentPage 
                    8 didapat dari jumlah data yang ditampilkan per halaman 
                dikalikan halaman sekarang dikurangi satu -->
                    <?php $i = 1 + (8 * ($currentPage - 1));  ?>
                    <?php foreach ($orang as $o) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $o['nama']; ?></td>
                            <td><?= $o['alamat']; ?></td>
                            <td><a href="" class="btn btn-info">Detail</a></td>
                        </tr>
                        <!-- <tr>
                        <th scope="row">2</th>
                        <td><img src="/img/onepiece.jpg" class="sampul"></td>
                        <td>One Piece</td>
                        <td><a href="" class="btn btn-info">Detail</a></td>
                    </tr> -->
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- menampilkan pagination -->
            <!-- orang adalah nama tabelnya, orang_paginaton adalah nama file template paginationya di App\Views\Pagers -->
            <?= $pager->links('orang', 'orang_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>