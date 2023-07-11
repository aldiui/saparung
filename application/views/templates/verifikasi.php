<div class="container-fluid vh-100 bg-primary">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-lg-5 col-md-7">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0 pb-0 text-center font-weight-bold">Verifikasi Surat</h2>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img src="<?= base_url();?>assets/img/Tasikmalaya.png" width="100px" alt="">
                        <div class="font-weight-bold mb-2">
                            <div>PEMERINTAH DAERAH KABUPATEN TASIKMALAYA</div>
                            <div>KECAMATAN CIBALONG</div>
                            <div>DESA PARUNG</div>
                        </div>
                        <div>Menyatakan Surat Ini Sah dan dapat digunakan sebagaimana mestinya.</div>
                    </div>
                    <hr class="my-1 py-1">
                    <div class="text-center">
                        <div>Surat : <?= $surat;?></div>
                        <div>Nomor Surat : <?= $data["nomor"];?></div>
                        <div>Penanda Tangan : <?= kades();?></div>
                        <div>Tanggal Surat : <?=  convertDateDBtoIndo($data["tanggal"]);?></div>
                        <?php
                        $nama = $this->db->get_where("data_penduduk",["id_data" => $data["data_id"]])->row_array();
                        ?>
                        <div>Atas Nama : <?= $nama["nama"];?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>