<div class="container-fluid vh-100">
    <div class="row vh-100">
        <div class="col-lg-6 bg-img d-none d-lg-block" ></div>
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
                            <form class="mb-2" action="<?= base_url();?>auth" method="POST">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email..." value="<?= set_value('email');?>"/>
                                    <?= form_error("email", '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password..." />
                                    <?= form_error("password", '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Masuk</button>
                                </div>                
                            </form>
                            <div class="text-center">
                                <small class="d-block mb-1">
                                    Lupa Password ? 
                                    <a href="<?= base_url();?>auth/forgotpassword" class="text-decoration-none">Klik</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>