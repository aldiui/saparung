<div class="sidebar">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <?php
                    $role_id = $this->session->userdata('role_id');
                    $queryMenu = "SELECT `user_menu`.`id_menu`, `menu` 
                                FROM `user_menu` JOIN `user_access_menu` 
                                ON `user_menu`.`id_menu` = `user_access_menu`.`menu_id`
                                WHERE `user_access_menu`.`role_id` = $role_id
                                ORDER BY `user_access_menu`.`menu_id` ASC
                            ";
                    $menu = $this->db->query($queryMenu)->result_array();
                ?>
                <?php foreach($menu as $m):?>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#<?= $m["menu"];?>">
                        <p><?= $m["menu"];?></p>
                        <span class="caret"></span>
                    </a>
                    <?php
                    $menuId = $m["id_menu"];
                    $querySubMenu = "SELECT * 
                            FROM `user_sub_menu`
                            WHERE `menu_id` = $menuId
                            AND `is_active` = 1
                        ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>
                    <?php if($this->uri->segment(1) == strtolower($m["menu"])):?>
                        <div class="collapse show" id="<?= $m["menu"];?>">
                    <?php else: ?>
                        <div class="collapse" id="<?= $m["menu"];?>">
                    <?php endif;?>
                        <ul class="nav">
                            <?php foreach($subMenu as $sm):?>
                                <?php if($sm["id_submenu"] >= 9 AND $sm["id_submenu"] <= 28):?>
                                <?php else:?>
                                    <?php if($judul == $sm["title"]):?>
                                        <li class="nav-item active menu">
                                    <?php else:?>
                                        <li class="nav-item">
                                    <?php endif;?>
                                        <a href="<?= base_url().$sm['url'];?>">
                                            <i class="<?=  $sm['icon'];?>"></i>
                                            <span class="sub-item"><?= $sm["title"];?></span>
                                        </a>
                                    </li>
                                <?php endif;?>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </li>
                <hr class="mb-2">
                <?php endforeach;?>
                <li class="nav-item">
                    <a href="<?= base_url();?>auth/logout" class="tombol-logout">
                        <i class="fas fa-fw fas fa-sign-out-alt"></i>
                        <span class="sub-item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>