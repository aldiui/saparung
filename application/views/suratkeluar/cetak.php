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

            h3 {
                line-height: normal;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <table width="100%">
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
                    <th> 
                        <h3>
                            PEMERINTAH DAERAH KABUPATEN TASIKMALAYA
                        </h3>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h3>
                            KECAMATAN CIBALONG
                        </h3>    
                    </th>
                </tr>
                <tr>
                    <th>
                        <h3>
                            DESA PARUNG
                        </h3>
                    </th>
                </tr>
                <tr>
                    <td class="text-center">Jl. Raya Karangnunggal Km.30 Pangukusan, Parung, Cibalong, Tasikmalaya Kode Pos 46185</td>
                </tr>
            </thead>
        </table>
        <hr>
        <br>
        <div class="text-center">
            <h3>LAPORAN SURAT KELUAR <?= strtoupper($waktu.convertDateDBtoIndo($perbulan));?></h3>
            <br>
        </div>
        <table width="100%" border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Register</th>
                    <th scope="col">Nomor Surat</th>
                    <th scope="col">Isi Surat</th>
                    <th scope="col">Ditujukan Kepada</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
                <?php 
                $no = 1; 
                foreach($km as $ada):?>
                <tbody>
                    <tr>
                        <td class="text-center"><?= $no++;?></td>
                        <td scope="row"><?= convertDateDBtoIndo($ada["tanggal"]);?></td>
                        <td scope="row"><?= $ada["nomor"];?></td>
                        <td scope="row">Surat Keterangan Kematian</td>
                        <td scope="row"><?= $ada["nama"];?></td>
                        <td scope="row">Keterangan Kematian</td>
                    </tr>
                </tbody>
                <?php endforeach;?>
                <?php 
                $no1 = $no; 
                foreach($tt as $ada):?>
                <tbody>
                    <tr>
                        <td class="text-center"><?= $no1++;?></td>
                        <td scope="row"><?= convertDateDBtoIndo($ada["tanggal"]);?></td>
                        <td scope="row"><?= $ada["nomor"];?></td>
                        <td scope="row">Surat Keterangan Taksiran Tanah</td>
                        <td scope="row"><?= $ada["nama"];?></td>
                        <td scope="row"><?= $ada["keperluan"];?></td>
                    </tr>
                </tbody>
                <?php endforeach;?>
                <?php 
                $no2 = $no1; 
                foreach($us as $ada):?>
                <tbody>
                    <tr>
                        <td class="text-center"><?= $no2++;?></td>
                        <td scope="row"><?= convertDateDBtoIndo($ada["tanggal"]);?></td>
                        <td scope="row"><?= $ada["nomor"];?></td>
                        <td scope="row">Surat Keterangan Usaha</td>
                        <td scope="row"><?= $ada["nama"];?></td>
                        <td scope="row"><?= $ada["keperluan"];?></td>
                    </tr>
                </tbody>
                <?php endforeach;?>
                <?php 
                $no3 = $no2; 
                foreach($ck as $ada):?>
                <tbody>
                    <tr>
                        <td class="text-center"><?= $no3++;?></td>
                        <td scope="row"><?= convertDateDBtoIndo($ada["tanggal"]);?></td>
                        <td scope="row"><?= $ada["nomor"];?></td>
                        <td scope="row">Surat Keterangan Catatan Kepolisian</td>
                        <td scope="row"><?= $ada["nama"];?></td>
                        <td scope="row"><?= $ada["keperluan"];?></td>
                    </tr>
                </tbody>
                <?php endforeach;?>
                <?php 
                $no4 = $no3; 
                foreach($dm as $ada):?>
                <tbody>
                    <tr>
                        <td class="text-center"><?= $no4++;?></td>
                        <td scope="row"><?= convertDateDBtoIndo($ada["tanggal"]);?></td>
                        <td scope="row"><?= $ada["nomor"];?></td>
                        <td scope="row">Surat Keterangan Domisili</td>
                        <td scope="row"><?= $ada["nama"];?></td>
                        <td scope="row"><?= $ada["keperluan"];?></td>
                    </tr>
                </tbody>
                <?php endforeach;?>
                <?php 
                $no5 = $no4; 
                foreach($kr as $ada):?>
                <tbody>
                    <tr>
                        <td class="text-center"><?= $no5++;?></td>
                        <td scope="row"><?= convertDateDBtoIndo($ada["tanggal"]);?></td>
                        <td scope="row"><?= $ada["nomor"];?></td>
                        <td scope="row">Surat Izin Acara Keramaian</td>
                        <td scope="row"><?= $ada["nama"];?></td>
                        <td scope="row"><?= $ada["jenis_kegiatan"];?></td>
                    </tr>
                </tbody>
                <?php endforeach;?>
        </table>
        <br>
        <table class="text-center" width="100%">
            <tr>
                <td width="80%"></td>
                <td>
                    <div>Parung,  <?= convertDateDBtoIndo(date('Y-m-d'));?></div>
                    <div>Kepala Desa Parung,</div>
                    <?php
                        $path = linkqr().'assets/img/qr/laporansuratkeluar.png'; //Lokasi file gambar
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