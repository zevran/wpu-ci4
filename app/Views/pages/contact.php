<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 my-3">
            <h3>Contact Kami</h3>

            <!-- Form contact -->
            <section class="mb-3">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword">
                    </div>
                </div>
            </section>

            <!-- list item -->
            <section class="mt-3">
                <?php foreach ($alamat as $a) : ?>
                    <ul class="list-group mt-3">
                        <!-- <li class="list-group-item active" aria-current="true">An active item</li> -->
                        <li class="list-group-item active"><?= $a['tipe']; ?></li>
                        <li class="list-group-item"><?= $a['alamat']; ?></li>
                        <li class="list-group-item"><?= $a['kota']; ?></li>
                        <!-- <li class="list-group-item">And a fifth one</li> -->
                    </ul>
                <?php endforeach; ?>
            </section>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>