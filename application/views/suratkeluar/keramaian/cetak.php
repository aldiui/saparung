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
                <ins>SURAT IZIN ACARA KERAMAIAN</ins>
            </strong>
            <div class="text-center">Nomor : <?= $keramaian["nomor"];?></div>
        </div>
        <br>
        <div class="text-justify text-indent">Yang bertanda tangan dibawah ini Kepala Desa Parung Kecamatan Cibalong Kabupaten Tasikmalaya, dengan ini menerangkan bahwa :</div>
        <table>
            <tr>
                <td class="text-indent" width="200px">Nama</td>
                <td>:</td>
                <td><?= $keramaian["nama"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?= $keramaian["tempat_lhr"];?> , <?= convertDateDBtoIndo($keramaian["tgl_lhr"]);?></td>
            </tr>
            <tr>
                <td class="text-indent">Pekerjaan</td>
                <td>:</td>
                <td><?= $keramaian["pekerjaan"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Alamat</td>
                <td>:</td>
                <td><?= $keramaian["alamat"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Acara Kegiatan</td>
                <td>:</td>
                <td><?= $keramaian["jenis_kegiatan"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Dalam Rangka</td>
                <td>:</td>
                <td><?= $keramaian["acara"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Hari</td>
                <td>:</td>
                <td><?= getDayIndonesia($keramaian["tgl_acara"]);?></td>
            </tr>
            <tr>
                <td class="text-indent">Tanggal</td>
                <td>:</td>
                <td><?= convertDateDBtoIndo($keramaian["tgl_acara"]);?></td>
            </tr>
            <tr>
                <td class="text-indent">Jam</td>
                <td>:</td>
                <td><?= $keramaian["jam"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Tempat</td>
                <td>:</td>
                <td><?= $keramaian["tempat"];?></td>
            </tr>
        </table>
        <div class="text-justify text-indent">Dengan ini menerangkan bahwa pada prinsipnya tidak keberatan atas permohonan yang bersangkutan dengan ketentuan sebagai berikut :</div>
        <ol class="tab">
            <li class="text-justify">Pada waktu dilaksanakan rame-rame harus disertai dengan ketentraman dan ketertiban dalam lingkungannya baik hubungan dengan tetangga, menghargai waktu-waktu ibadat dalam menciptakan kerukunan umat beragama maupun kebersihan lingkungan setelah selesai rame-rame.</li>
            <li class="text-justify">Pada waktu dilaksanakan rame-rame tidak dibenarkan / dilarang melakukan hal-hal yang bertentangan dengan adat istiadat bangsa.</li>
        </ol>
        <div class="text-justify text-indent">Demikian Izin Acara Keramaian ini dibuat dengan sebenarnya untuk digunakan sebagaimana mestinya.</div>
        <br>
        <div>
            <table style="width: 100%;">
                <tr class="text-center">
                    <td width="50%">
                        <div>Mengetahui</div>
                        <div>Camat Cibalong,</div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div>...........................................</div>
                    </td>
                    <td width="50%">
                        <div>Parung, <?= convertDateDBtoIndo($keramaian["tanggal"]);?></div>
                        <div>Kepala Desa Parung,</div>
                        <?php
                        $imageqr = $keramaian["qr"];
                        $path = linkqr().$imageqr; //Lokasi file gambar
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $gbr_base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        ?>
                        <img src="<?=  $gbr_base64;?>" alt="">
                        <div><strong><?= kades();?></strong></div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div>Pertimbangan Kapolsek Cibalong</div>
                        <div>Nomor : ....................................................................</div>
                        <div>Atas permohonannya : Tidak / Dapat diidzinkan</div>
                        <div>Dengan catatan :</div>
                        <ol>
                            <li>....................................................................</li>
                            <li>....................................................................</li>
                            <li>....................................................................</li>
                        </ol>                    
                    </td>
                </tr>
                <tr class="text-center">
                    <td>
                        <div>Danramil 1216 Cibalong,</div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div>...........................................</div>
                    </td>
                    <td>             
                        <div>Kapolsek Cibalong,</div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div>...........................................</div>
                    </td>
                </tr>
            </table>    
        </body>
        </div>
</html>