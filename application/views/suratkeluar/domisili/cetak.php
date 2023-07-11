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
                <ins>SURAT KETERANGAN DOMISILI</ins>
            </strong>
            <div class="text-center">Nomor : <?= $domisili["nomor"];?></div>
        </div>
        <br>
        <div class="text-justify text-indent">Yang bertanda tangan dibawah ini Kepala Desa Parung Kecamatan Cibalong Kabupaten Tasikmalaya, dengan ini menerangkan bahwa :</div>
        <br>
        <table>
            <tr>
                <td class="text-indent" width="200px">NIK</td>
                <td>:</td>
                <td><?= $domisili["nik"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Nama</td>
                <td>:</td>
                <td><?= $domisili["nama"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?= $domisili["tempat_lhr"];?>, <?= convertDateDBtoIndo($domisili["tgl_lhr"]);?></td>
            </tr>
            <tr>
                <td class="text-indent">Jenis Kelamin</td>
                <td>:</td>
                <td><?= $domisili["jk"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Agama</td>
                <td>:</td>
                <td><?= $domisili["agama"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Kewarganegaraan</td>
                <td>:</td>
                <td>Indonesia</td>
            </tr>
            <tr>
                <td class="text-indent">Status Perkawinan</td>
                <td>:</td>
                <td><?= $domisili["status"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Pekerjaan</td>
                <td>:</td>
                <td><?= $domisili["pekerjaan"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Alamat</td>
                <td>:</td>
                <td><?= $domisili["alamat"];?></td>
            </tr>
        </table>
        <br>
        <div class="text-justify text-indent">Penduduk tersebut benar – benar  beralamat seperti keterangan diatas, dan pada saat ini sedang berdomisili <?= $domisili["alamat"];?>.</div>
        <br>
        <div class="text-justify text-indent">Demikian Surat Keterangan ini dibuat dengan sebenarnya untuk dipergunakan seperlunya.</div>
        <br>
        <br>
        <table class="text-center">
            <tr>
                <td width="500px"></td>
                <td>
                    <div>Parung,  <?= convertDateDBtoIndo($domisili["tanggal"]);?></div>
                    <div>Kepala Desa Parung,</div>
                    <?php
                        $imageqr = $domisili["qr"];
                        $path = linkqr().$imageqr;
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