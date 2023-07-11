<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
        <title><?=  $title;?></title>
        <link rel="icon" href="<?= base_url();?>assets/img/icon.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" integrity="sha512-QKC1UZ/ZHNgFzVKSAhV5v5j73eeL9EEN289eKAEFaAjgAiobVAnVv/AGuPbXsKl1dNoel3kNr6PYnSiTzVVBCw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- CSS Files -->
        <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url();?>assets/css/atlantis.min.css">
        <link rel="stylesheet" href="<?= base_url();?>assets/css/style.css">

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="<?= base_url();?>assets/css/demo.css">
        <link rel="stylesheet" href="<?= base_url();?>assets/data/DataTables-1.13.1/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url();?>assets/data/Buttons-2.3.3/css/buttons.bootstrap4.min.css">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css" rel="stylesheet" />
        <style>
            #basic-datatables_filter {
                display: inline-flex;
                float: right;
                margin-left: 12px;
            }
            #basic-datatables_length {
                display: inline-flex;
                float: left;
                text-align: center;
                margin-left: 12px;
                margin-bottom: 12px;
            }
            .dt-buttons{
                display: flex;
                margin-bottom: 14px;
            }
        </style>
        
    </head>
    <body>
        <div class="error-data" data-error="<?= $this->session->flashdata("error");?>"></div>
        <div class="success-data" data-success="<?= $this->session->flashdata("success");?>"></div>
        <div class="wrapper">
        