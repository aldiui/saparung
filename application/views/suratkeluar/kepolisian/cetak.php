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
                <ins>SURAT KETERANGAN CATATAN KEPOLISIAN</ins>
            </strong>
            <div class="text-center">Nomor : <?= $kepolisian["nomor"];?></div>
        </div>
        <br>
        <div class="text-justify text-indent">Yang bertanda tangan dibawah ini Kepala Desa Parung Kecamatan Cibalong Kabupaten Tasikmalaya, dengan ini menerangkan bahwa :</div>
        <br>
        <table>
            <tr>
                <td class="text-indent" width="200px">NIK</td>
                <td>:</td>
                <td><?= $kepolisian["nik"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Nama</td>
                <td>:</td>
                <td><?= $kepolisian["nama"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?= $kepolisian["tempat_lhr"];?> , <?= convertDateDBtoIndo($kepolisian["tgl_lhr"]);?></td>
            </tr>
            <tr>
                <td class="text-indent">Jenis Kelamin</td>
                <td>:</td>
                <td><?= $kepolisian["jk"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Pekerjaan</td>
                <td>:</td>
                <td><?= $kepolisian["pekerjaan"];?></td>
            </tr>
            <tr>
                <td class="text-indent">Alamat</td>
                <td>:</td>
                <td><?= $kepolisian["alamat"];?></td>
            </tr>
        </table>
        <br>
        <div class="text-justify text-indent">Orang tersebut diatas adalah benar Penduduk Desa Parung, berdasarkan surat pengantar dari RT dan RW nya  serta catatan pada register kependudukan desa  orang tersebut :</div>
        <ol class="tab">
            <li>Berkelakuan baik.</li>
            <li>Belum/tidak pernah melakukan tindak kriminal yang berurusan dengan hukum dan pihak kepolisian.</li>
            <li>Tidak pernah terlibat dalam pemakai /pengedar Narkoba.</li>
            <li>Tidak pernah atau tercatat sebagai pengurus/anggota partai politik atau jaringan organisasi terlarang.</li>
        </ol>
        <div class="text-justify text-indent">
            Surat keterangan dibuat untuk keperluan Persyaratan Melamar Pekerjaan Berlaku mulai tanggal <?= convertDateDBtoIndo($kepolisian["tanggal"]);?> s/d 
            <?=  convertDateDBtoIndo(manipulasiBulan($kepolisian["tanggal"], '1', 'months'));?> Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan dengan semestinya.
        </div>
        <br>
        <br>
        <table class="text-center">
            <tr>
                <td width="500px"></td>
                <td>
                    <div>Parung, <?= convertDateDBtoIndo($kepolisian["tanggal"]);?></div>
                    <div>Kepala Desa Parung,</div>
                    <?php
                        $imageqr = $kepolisian["qr"];
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