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
                <ins>SURAT KETERANGAN KEMATIAN</ins>
            </strong>
            <div class="text-center">Nomor : <?= $kematian["nomor"];?></div>
        </div>
        <br>
        <div class="text-justify text-indent">Yang bertanda tangan dibawah ini Kepala Desa Parung Kecamatan Cibalong Kabupaten Tasikmalaya, dengan ini menerangkan bahwa :</div>
        <br>
        <table>
            <tr>
                <td class="text-indent" >NIK</td>
                <td>:</td>
                <td><?= $kematian["nik"];?></td>
            </tr>
            <tr>
                <td class="text-indent" width="200px">Nama</td>
                <td>:</td>
                <td><?= $kematian["nama"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?= $kematian["tempat_lhr"];?> , <?= convertDateDBtoIndo($kematian["tgl_lhr"]);?></td>
            </tr>
            <tr>
                <td class="text-indent">Jenis Kelamin</td>
                <td>:</td>
                <td><?= $kematian["jk"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Pekerjaan</td>
                <td>:</td>
                <td><?= $kematian["pekerjaan"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Alamat</td>
                <td>:</td>
                <td><?= $kematian["alamat"];?></td>
            </tr>
        </table>
        <br>
        <div class="text-justify text-indent">Orang tersebut diatas menurut catatan yang ada pada register kependudukan di Desa kami, adalah benar selaku penduduk Desa Parung Kecamatan Cibalong Kabupaten Tasikmalaya dan orang tersebut pada Tanggal <?= ConvertDateDBtoIndo($kematian["tgl_mati"]);?> Jam <?= $kematian["jam_mati"];?> wib telah meninggal dunia di  <?= $kematian["meninggal_di"];?>  dikarenakan <?= $kematian["sebab"];?> dan pada hari itu juga langsung jam  <?= $kematian["jam_kubur"];?> wib dimakamkan di <?= $kematian["dikuburkan_di"];?>.</div>
        <br>
        <div class="text-justify text-indent">Demikian surat keterangan ini kami buat atas dasar yang sebenarnya, dan kepada yang berkepentingan agar menjadi maklum.</div>
        <br>
        <br>
        <table class="text-center">
            <tr>
                <td width="500px"></td>
                <td>
                    <div>Parung, <?= convertDateDBtoIndo($kematian["tanggal"]);?></div>
                    <div>Kepala Desa Parung,</div>
                    <?php
                        $imageqr = $kematian["qr"];
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