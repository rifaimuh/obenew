<head>
    <style>
        table tr td {
            /* border: 1px solid black; */
            background-color: transparent;
        }

        td {
            padding-bottom: 10px;
        }

        img.center {
            display: block;
            margin: 0 auto;
        }

        /* @page :first {
            background: url('images/background_skpi.png');
        } */
    </style>
</head>
<?php
$head_width = 5;
$isi  = 2;
$_isi_font = 11.5;
$_col_width = 22;

$font_nilai = 13;
?>

<body style="background: url('images/background_skpi2.png');background-image-resize: 5;">
    <table class="table">
        <!-- Nomer 3 -->
        <tr>
            <td style="width: 10%;"></td>
            <td colspan="2">
                <p style="font-size:12px">
                    <b> 3. INFORMASI MENGENAI KUALIFIKASI DAN HASIL CAPAIAN </b> <br>
                    <i style="font-size:11px;color:grey">3. INFORMATION OF QUALIFICATION AND ACHIEVEMENT</i>
                </p>
            </td>
        </tr>
        <tr>
            <td style="width: 10%;"></td>
            <td colspan="2">
                <p style="font-size:12px">
                    <b> 3.1 CAPAIAN PEMBELAJARAN LULUSAN </b> <br>
                    <i style="font-size:11px;color:grey">3.1 LEARNING OUTCOMES</i>
                </p>
            </td>
        </tr>
        <?php foreach ($data['refCpl'] as $cpl) {
        ?>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 10%;border: 1px solid black;text-align:center;vertical-align:top;">
                    <p style="font-size:12px">
                        <?= $cpl->kode ?>
                    </p>
                </td>
                <td style="text-align: justify;vertical-align: top;border: 1px solid black;">
                    <p style="font-size:12px;">
                        <?= $cpl->isi ?>
                        <br>
                        <i style="font-size:11px;color:grey"><?= $cpl->isi_en ?></i>
                    </p>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <p style="height: 254px;">
    </p>
    <div style="position: fixed;">
        <div style="float: left; width: 60%;">
            <p style="text-align: left;font-size:10px;color:white">
                <?= strtoupper($data['setupPrint']['nama']) ?> - <?= strtoupper($data['setupPrint']['nim']) ?>
            </p>
        </div>
        <div style="float: right; width: 23%;">
            <p style="text-align: right;font-size:10px;color:white">
                &nbsp;&nbsp;HALAMAN 2 DARI 3 <i style="font-size:10px;color:white"> / PAGE 2 OF 3</i>
            </p>
        </div>
    </div>    <pagebreak />
    <table class="table">
        <!-- Nomer 3.2 -->
        <tr>
            <td style="width: <?= $head_width ?>%;"></td>
            <td colspan="2">
                <p style="font-size:13px">
                    <b> 3.2 HASIL CAPAIAN LULUSAN </b> <br>
                    <i style="font-size:13px;color:grey">3.2 GRADUATE ACHIEVEMENT RESULT</i>
                </p>
            </td>
            <td style="width: <?= $head_width ?>%;"></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td style="width: 76%;" rowspan="10">
                <img src="images/radar.png" style="align:left" width="90%">
            </td>
            <td rowspan="2" style="text-align:center;border: 1px solid black;">
                <p style="font-size: <?= $font_nilai ?>px;">
                    <b> Rentang Nilai <br> (Skala 100) </b> <br>
                    <i style="font-size:<?= $font_nilai ?>px;color:grey">Grade Range <br> (Scale 100)</i>
                </p>
            </td>
            <td colspan="2" style="text-align:center;border: 1px solid black;">
                <p style="font-size: <?= $font_nilai ?>px;">
                    <b> Rentang Nilai </b> <br>
                    <i style="font-size:<?= $font_nilai ?>px;color:grey">Grading Range</i>
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;border: 1px solid black;">
                <p style="font-size: <?= $font_nilai ?>px;">
                    <b> Angka </b> <br>
                    <i style="font-size:<?= $font_nilai ?>px;color:grey">Number</i>
                </p>
            </td>
            <td style="text-align:center;border: 1px solid black;">
                <p style="font-size: <?= $font_nilai ?>px;">
                    <b> Huruf </b> <br>
                    <i style="font-size:<?= $font_nilai ?>px;color:grey">Leter</i>
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;border: 1px solid black;">
                >=85
            </td>
            <td style="text-align:center;border: 1px solid black;">
                4
            </td>
            <td style="text-align:center;border: 1px solid black;">
                A
            </td>
        </tr>
        <tr>
            <td style="text-align:center;border: 1px solid black;">
                80-84
            </td>
            <td style="text-align:center;border: 1px solid black;">
                3.7
            </td>
            <td style="text-align:center;border: 1px solid black;">
                A-
            </td>
        </tr>
        <tr>
            <td style="text-align:center;border: 1px solid black;">
                75-79
            </td>
            <td style="text-align:center;border: 1px solid black;">
                3.3
            </td>
            <td style="text-align:center;border: 1px solid black;">
                B+
            </td>
        </tr>
        <tr>
            <td style="text-align:center;border: 1px solid black;">
                70-74
            </td>
            <td style="text-align:center;border: 1px solid black;">
                3
            </td>
            <td style="text-align:center;border: 1px solid black;">
                B
            </td>
        </tr>
        <tr>
            <td style="text-align:center;border: 1px solid black;">
                65-69
            </td>
            <td style="text-align:center;border: 1px solid black;">
                2.7
            </td>
            <td style="text-align:center;border: 1px solid black;">
                C+
            </td>
        </tr>
        <tr>
            <td style="text-align:center;border: 1px solid black;">
                60-64
            </td>
            <td style="text-align:center;border: 1px solid black;">
                2
            </td>
            <td style="text-align:center;border: 1px solid black;">
                C
            </td>
        </tr>
        <tr>
            <td style="text-align:center;border: 1px solid black;">
                55-59
            </td>
            <td style="text-align:center;border: 1px solid black;">
                1
            </td>
            <td style="text-align:center;border: 1px solid black;">
                D
            </td>
        </tr>
        <tr>
            <td style="text-align:center;border: 1px solid black;">
                < 55 </td> <td style="text-align:center;border: 1px solid black;">
                    0
            </td>
            <td style="text-align:center;border: 1px solid black;">
                E
            </td>
        </tr>
    </table>
    <div style=" text-align: center;">
        <img src="images/bar.png" class="center" width="80%">
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td style="width: 70%;">
                <p style="color: white;">
                    creted by Adip Safiudin
                </p>
            </td>
            <td>
            <?php  
                $tgl = ucfirst($data['setupPrint']['tgl_lulus']);
                $cc = strlen($tgl);
                for ($x = 3; $x <= $cc; $x++) {
                    if (substr($tgl,$x,2) == "20"){
                        $bln = substr($tgl,3,$x-4);
                        $thn = substr($tgl,$x-1);
                    }
                }
                if($bln == "January") $bln = "Januari";
                if($bln == "February") $bln = "Februari";
				if($bln == "March") $bln = "Maret";
				if($bln == "April") $bln = "April";
				if($bln == "May") $bln = "Mei";
				if($bln == "June") $bln = "Juni";
				if($bln == "July") $bln = "Juli";
				if($bln == "August") $bln = "Agustus";
				if($bln == "September") $bln = "September";
				if($bln == "October") $bln = "Oktober";
				if($bln == "November") $bln = "November";
				if($bln == "December") $bln = "Desember";
                $tgle =  substr($tgl,0,3) . $bln . $thn;            ?> 
                <p style="font-size: <?= $font_nilai ?>px;">
                    SURAKARTA, <?= $tgle ?> <br>
                    <!-- SURAKARTA, <-?= strtoupper(date("d F yy")) ?> <br> -->
                    <i style="font-size:<?= $font_nilai ?>px;color:grey">Surakarta, <?= date("F d, Y", strtotime(ucfirst($data['setupPrint']['tgl_lulus']))) ?></i> <br><br>
                    DEKAN FAKULTAS TEKNIK <br>
                    <i style="font-size:<?= $font_nilai ?>px;color:grey">Dean of Engineering Faculty</i> <br><br><br><br><br>

                    <u><?= $data['setupAplikasi']->nama_dekan ?></u> <br>
                    NIP. <?= $data['setupAplikasi']->nip_dekan ?> <br>
                    <i style="font-size:<?= $font_nilai ?>px;color:grey">Employee ID Number</i>
                </p>
            </td>
        </tr>
    </table>
    <p style="height: 28px;">
    </p>
    <div style="position: fixed;">
        <div style="float: left; width: 60%;">
            <p style="text-align: left;font-size:10px;color:white">
                <?= strtoupper($data['setupPrint']['nama']) ?> - <?= strtoupper($data['setupPrint']['nim']) ?>
            </p>
        </div>
        <div style="float: right; width: 23%;">
            <p style="text-align: right;font-size:10px;color:white">
                &nbsp;&nbsp;HALAMAN 3 DARI 3 <i style="font-size:10px;color:white"> / PAGE 3 OF 3</i>
            </p>
        </div>
    </div>
</body>
</html>