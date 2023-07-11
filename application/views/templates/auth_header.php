<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
        <title><?=  $judul;?></title>
        <link rel="icon" href="<?= base_url();?>assets/img/icon.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" integrity="sha512-QKC1UZ/ZHNgFzVKSAhV5v5j73eeL9EEN289eKAEFaAjgAiobVAnVv/AGuPbXsKl1dNoel3kNr6PYnSiTzVVBCw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- CSS Files -->
        <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url();?>assets/css/atlantis.min.css">
        <link rel="stylesheet" href="<?= base_url();?>assets/css/style.css">

        <style>
            .bg-img {
                background-image: url("<?= base_url();?>assets/img/desa.jpg");
                background-size: cover;
                background-position: left;
                background-repeat: no-repeat;
            }
        </style>

    </head>
    <body>
        <div class="error-data" data-error="<?= $this->session->flashdata("error");?>"></div>
        <div class="success-data" data-success="<?= $this->session->flashdata("success");?>"></div>