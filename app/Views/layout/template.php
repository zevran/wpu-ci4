<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">
    <title><?= $title; ?></title>
</head>


<body>
    <?= $this->include('layout/navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <script src="<?= base_url('js/jquery-3.6.4.min.js'); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url('js/script.js'); ?>"></script>
    <script src="<?= base_url('js/bootstrap.js'); ?>"></script>
    <script>
        function previewImg() {
            const sampul = document.querySelector('#sampul');
            const sampulLabel = document.querySelector('.label-sampul');
            const imgPreview = document.querySelector('.img-preview');

            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>