<div class="main-header">
	<div class="logo-header" data-background-color="blue">
		<a href="<?= base_url();?>admin" class="logo d-flex justify-content-center align-items-center">
			<div>
				<img src="<?= base_url();?>assets/img/icon.png" width="30px" alt="navbar brand" class="img-fluid">
			</div>
			<span class="navbar-brand text-white font-weight-bold ml-3 d-inline">SAPARUNG</span>
		</a>
		<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
				<i class="icon-menu"></i>
			</span>
		</button>
		<button class="topbar-toggler more">
			<i class="icon-options-vertical"></i>
		</button>
		<div class="nav-toggle">
			<button class="btn btn-toggle toggle-sidebar">
				<i class="icon-menu"></i>
			</button>
		</div>
	</div>
	<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
		<div class="container-fluid">
			<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
				<span class="text-white mr-2"><?= $user["name"];?></span>
				<li class="nav-item dropdown hidden-caret">
					<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
						<div class="avatar-sm">
							<img src="<?= base_url().'assets/img/profile/'.$user['image'];?>" alt="..." class="avatar-img rounded-circle">
						</div>
					</a>
					<ul class="dropdown-menu dropdown-user animated fadeIn">
						<div class="dropdown-user-scroll scrollbar-outer">
							<li>
								<div class="user-box">
									<?php
										$role_cari = $user["role_id"];
										$queryCari = "SELECT `user_role`.`id_role`, `role` 
													FROM `user_role` JOIN `user` 
													ON `user_role`.`id_role` = `user`.`role_id`
													WHERE `user_role`.`id_role` = $role_cari 
												";
										$jabatan = $this->db->query($queryCari)->row_array();
									?>
									<div class="avatar-lg"><img src="<?= base_url().'assets/img/profile/'.$user['image'];?>" alt="image profile" class="avatar-img rounded"></div>
									<div class="u-text my-auto">
										<h4><?= $user["name"];?></h4>
										<p class="text-muted"><?= $jabatan["role"];?></p>
									</div>
								</div>
							</li>
							<li>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= base_url();?>user">Profil</a>
								<a class="dropdown-item tombol-logout" href="<?= base_url();?>auth/logout">Logout</a>
							</li>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</div>
<div class="main-panel">
