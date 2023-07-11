<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?=  $judul;?></title>
        <style>
            * {
                line-height: 22px;
            }

            .text-justify {
                text-align: justify;
            }
            .text-indent {
                text-indent: 0.6cm;
            }
            .tab {
                padding-left: 1.2cm;
            }
            .text-center {
                text-align: center;
            }

            hr{
                border-width: 3px;
                border-color: dark;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th rowspan="4">
                    <?php
                            $path1 = linkqr().'assets/img/Tasikmalaya.png'; //Lokasi file gambar
                            $type1 = pathinfo($path1, PATHINFO_EXTENSION);
                            $data1 = file_get_contents($path1);
                            $logo_base64 = 'data:image/' . $type1 . ';base64,' . base64_encode($data1);
                        ?>
                        <img src="<?= $logo_base64;?>" alt="" width="85px">
                    </th>
                    <th>PEMERINTAH DAERAH KABUPATEN TASIKMALAYA</th>
                </tr>
                <tr>
                    <th>KECAMATAN CIBALONG</th>
                </tr>
                <tr>
                    <th>DESA PARUNG</th>
                </tr>
                <tr>
                    <td class="text-center">Jl. Raya Karangnunggal Km.30 Pangukusan, Parung, Cibalong, Tasikmalaya Kode Pos 46185</td>
                </tr>
            </thead>
        </table>
        <hr>
        <br>
        <div class="text-center">
            <strong>
                <ins>SURAT KETERANGAN TAKSIRAN TANAH</ins>
            </strong>
            <div class="text-center">Nomor : <?= $taksiran_tanah["nomor"];?></div>
        </div>
        <br>
        <div class="text-justify text-indent">Yang bertanda tangan dibawah ini Kepala Desa Parung Kecamatan Cibalong Kabupaten Tasikmalaya, dengan ini menerangkan bahwa :</div>
        <br>
        <?php $data = $this->db->get_where('data_penduduk', ['id_data' => $taksiran_tanah["data_id"]])->row_array();?>
        <table>
            <tr>
                <td class="text-indent" width="200px">NIK</td>
                <td>:</td>
                <td><?= $data["nik"];?></td>
            </tr>
            <tr>
                <td class="text-indent" width="200px">Nama</td>
                <td>:</td>
                <td><?= $data["nama"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Alamat</td>
                <td>:</td>
                <td><?= $data["alamat"];?></td>
            </tr>
            <tr>
                <td class="text-indent">NOP</td>
                <td>:</td>
                <td><?= $taksiran_tanah["nop"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Luas Tanah</td>
                <td>:</td>
                <td><?= $taksiran_tanah["luas"];?> M<sup>2</sup></td>
            </tr>
            <tr>
                <td class="text-indent">Luas Bata</td>
                <td>:</td>
                <td><?= ceil($taksiran_tanah["luas"]/14);?> Bata</td>
            </tr>
            <br>    
            <tr>
                <td colspan="3" class="text-indent">Dengan batas sebagai berikut :</td>
            </tr>
            <tr>
                <td class="text-indent">Utara</td>
                <td>:</td>
                <td><?= $taksiran_tanah["utara"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Timur</td>
                <td>:</td>
                <td><?= $taksiran_tanah["timur"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Selatan</td>
                <td>:</td>
                <td><?= $taksiran_tanah["selatan"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Barat</td>
                <td>:</td>
                <td><?= $taksiran_tanah["barat"];?></td>
            </tr>
            <br>
            <tr>
                <td class="text-indent">Harga Taksiran Tanah</td>
                <td>:</td>
                <td>Rp. <?= number_format($taksiran_tanah["harga"],0,",","."); ?>,- / Bata</td>
            </tr>
            <?php  
            $bata =  ceil($taksiran_tanah["luas"]/14);
            $total = $taksiran_tanah["harga"] * $bata
            ;?>
            <tr>
                <td class="text-indent">Total Harga</td>
                <td>:</td>
                <td>Rp. <?= number_format($total,0,",","."); ?>,-</td>
            </tr>
        </table>
        <br>
        <div class="text-justify text-indent">Demikian Surat Keterangan ini kami buat dengan sebenarnya, agar yang berkepentingan menjadi tahu dan maklum adanya.</div>
        <br>
        <br>
        <table class="text-center">
            <tr>
                <td width="500px"></td>
                <td>
                    <div>Parung, <?= convertDateDBtoIndo($taksiran_tanah["tanggal"]);?></div>
                    <div>Kepala Desa Parung,</div>
                    <?php
                        $imageqr = $taksiran_tanah["qr"];
                        $path = linkqr().$imageqr; //Lokasi file gambar
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $gbr_base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    ?>
                    <img src="<?= $gbr_base64;?>" alt="">
                    <br>
                    <div><strong><?= kades();?></strong></div>
                </td>
            </tr>
        </table>    
    </body>
</html>