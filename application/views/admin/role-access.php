<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title"><?= $judul;?></h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="<?= base_url();?>user">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url();?>admin/role">Role</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a><?= $judul;?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Tabel Data <?= $judul;?></h4>
                    </div>
                    <div class="card-body"> 
                        <div class="table-responsive">
                            <table id="basic" class="display table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; 
                                    foreach($menu as $m):?>
                                        <tr>
                                            <td scope="row"><?= $no++;?></td>
                                            <td><?= $m["menu"];?></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="checkbox" class="form-check-input" <?= check_access($role["id_role"], $m["id_menu"]);?> data-role="<?= $role["id_role"];?>" data-menu="<?= $m["id_menu"];?>">
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?> 
                                </tbody>
                            </table>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
