<div class="container-fluid vh-100">
    <div class="row vh-100">
        <div class="col-lg-6 bg-img d-none d-lg-block"></div>
        <div class="col-lg-6 bg-primary">
            <div class="row justify-content-center align-items-center vh-100">
                <div class="col-12 col-md-10 col-lg-9">                  
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?= base_url();?>assets/img/Tasikmalaya.png" alt="" class="mb-1" width="80px">
                                <h2 class="text-center fw-bold h1">SAPARUNG</h2>
                                <div>Sistem Administrasi Desa Parung</div>
                            </div>
                            <form action="<?= base_url();?>auth/changepassword" method="POST">
                                <div class="form-group">
                                    <label for="password1">Password</label>
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukan Password Baru...">
                                    <?= form_error("password1", '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Konfirmasi Password</label>
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password Baru...">
                                    <?= form_error("password2", '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Ubah Password</button>
                                </div>                      
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
