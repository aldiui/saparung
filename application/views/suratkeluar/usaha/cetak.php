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
                <ins>SURAT KETERANGAN USAHA</ins>
            </strong>
            <div class="text-center">Nomor : <?= $usaha["nomor"];?></div>
        </div>
        <br>
        <div class="text-justify">Yang bertanda tangan dibawah ini,</div>
        <table>
            <tr>
                <td class="text-indent" width="200px">Nama</td>
                <td>:</td>
                <td>H. Karsono</td>
            </tr>
            <tr>
                <td class="text-indent">Jabatan</td>
                <td>:</td>
                <td>Kepala Desa Parung</td>
            </tr>
        </table>
        <br>
        <div class="text-justify">Yang bertanda tangan dibawah ini,</div>
        <table>
            <tr>
                <td class="text-indent" width="200px">NIK</td>
                <td>:</td>
                <td><?= $usaha["nik"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Nama</td>
                <td>:</td>
                <td><?= $usaha["nama"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?= $usaha["tempat_lhr"];?> , <?= convertDateDBtoIndo($usaha["tgl_lhr"]);?></td>
            </tr>
            <tr>
                <td class="text-indent">Jenis Kelamin</td>
                <td>:</td>
                <td><?= $usaha["jk"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Alamat</td>
                <td>:</td>
                <td><?= $usaha["alamat"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Jenis Usaha</td>
                <td>:</td>
                <td><?= $usaha["jenis_usaha"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Alamat Usaha</td>
                <td>:</td>
                <td><?= $usaha["alamat_usaha"];?></td>
            </tr>
        </table>
        <br>
        <div class="text-justify text-indent">Demikian surat keterangan ini kami buat dengan sebenarnya untuk menjadi bahan pertimbangan selanjutnya.</div>
        <br>
        <br>
        <table class="text-center">
            <tr>
                <td width="500px"></td>
                <td>
                    <div>Parung, <?= convertDateDBtoIndo($usaha["tanggal"]);?></div>
                    <div>Kepala Desa Parung,</div>
                    <?php
                        $imageqr = $usaha["qr"];
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