<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan SKPI</title>
    <link href="<?php echo Yii::getAlias('@vendor/mpdf/mpdf/css/bootstrap.css') ?>" rel="stylesheet">
    <style>
        table tr td {
            /* border: 1px solid black; */
            background-color: transparent;
        }

        td {
            padding-bottom: 10px;
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
$_col_width = 10;
?>

<body style="background: url('images/background_skpi.png');background-image-resolution: from-image;">
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
                $tgle =  substr($tgl,0,3) . $bln . $thn;
            ?> 
<?php  
                $tglm = ucfirst($data['setupPrint']['tgl_masuk']);
                $ccm = strlen($tglm);
                for ($xm = 3; $xm <= $ccm; $xm++) {
                    if (substr($tglm,$xm,2) == "20"){
                        $blnm = substr($tglm,3,$xm-4);
                        $thnm = substr($tglm,$xm-1);
                    }
                }
                if($blnm == "January") $blnm = "Januari";
                if($blnm == "February") $blnm = "Februari";
				if($blnm == "March") $blnm = "Maret";
				if($blnm == "April") $blnm = "April";
				if($blnm == "May") $blnm = "Mei";
				if($blnm == "June") $blnm = "Juni";
				if($blnm == "July") $blnm = "Juli";
				if($blnm == "August") $blnm = "Agustus";
				if($blnm == "September") $blnm = "September";
				if($blnm == "October") $blnm = "Oktober";
				if($blnm == "November") $blnm = "November";
				if($blnm == "December") $blnm = "Desember";
                $tglem =  substr($tglm,0,3) . $blnm . $thnm;
            ?> 
<?php  
                $tglttl = ucfirst($data['setupPrint']['ttl']);
                $ccttl = strlen($tglttl);
                for ($xttl = 0; $xttl <= $ccttl; $xttl++) {
                    if(substr($tglttl,$xttl,1)==","){
                      $tml =  substr($tglttl,0,$xttl);
                      $xd = $xttl+4;
                      $tl = (int)substr($tglttl,$xttl+1) ;
                      $blnttl = substr($tglttl,$xd,$ccttl-5-$xd);
                      $thnttl =  (int)substr($tglttl,$ccttl-5);
                    }
                  }
                if($blnttl == " Januari") $blnttl = " January";
                if($blnttl == " Februari") $blnttl = " February";
		if($blnttl == " Maret") $blnttl = " March";
		if($blnttl == " April") $blnttl = " April";
		if($blnttl == " Mei") $blnttl = " May";
		if($blnttl == " Juni") $blnttl = " June";
		if($blnttl == " Juli") $blnttl = " July";
		if($blnttl == " Agustus") $blnttl = " August";
		if($blnttl == " September") $blnttl = " September";
		if($blnttl == " Oktober") $blnttl = " October";
		if($blnttl == " November") $blnttl = " November";
		if($blnttl == " Desember") $blnttl = " December";

                $tglettl =  $tl . $blnttl . $thnttl;
            ?>
    <div class="row">
        <table class="table">
            <tr>
                <td style="background-color:transparent;width:66%">
                    <p style="font-size:15px">PROGRAM STUDI <?= strtoupper($data['setupAplikasi']->prodi_id) ?></p>
                    <i style="font-size:13px;color:grey"> Departement of <?= ucfirst($data['setupAplikasi']->prodi_en) ?> </i>
                </td>
                <td rowspan="2">
                    <p style="font-size:15px;">Nomor: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/UN27.8/PP/<?= date("Y", strtotime(ucfirst($data['setupPrint']['tgl_lulus'])))?></p>                    <i style="font-size:13px;color:grey">Number</i>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size:15px">FAKULTAS <?= strtoupper($data['setupAplikasi']->fakultas_id) ?></p>
                    <i style="font-size:13px;color:grey">Faculty of <?= ucfirst($data['setupAplikasi']->fakultas_en) ?></i>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <div style="text-align: center;">
        <h4 style="height: 50px;">
            <b style="height: 10px;"> SURAT KETERANGAN PENDAMPING IJAZAH</b> <br>
            <i style="font-size:16px;color:grey">Diploma Supplement</i>
        </h4>
        <p style="font-size:13px">
            Surat Keterangan Pendamping Ijazah (SKPI) merupakan pelengkap ijazah yang menerangkan <br>
            capaian pembelajaran pemegang ijazah selama masa studi
        </p>
        <i style="font-size:13px;color:grey">
            The Diploma Supplement accompanies a higher education certificate <br>
            providing learning outcomes achievement completed by its holder
        </i>
    </div>
    <p style="height: 43px;"></p>
    <div>
        <table class="table">
            <!-- Nomer 1 -->
            <tr>
                <td colspan="5">
                    <p style="font-size:13px">
                        <b> 1. IDENTITAS PEMEGANG SKPI </b>
                        <i style="font-size:13px;color:grey">/ Identity of Diploma Supplement Holders</i>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;"></td>
                <td colspan="2">
                    <p style="font-size:13px;">
                        NAMA LENGKAP
                        <i style="font-size:13px;color:grey">/ Full Name</i>
                    </p>
                </td>
                <td colspan="2" style="width: <?= $_col_width ?>%;">
                    <p style="font-size:13px">
                        &nbsp;&nbsp;TANGGAL MASUK
                        <i style="font-size:13px;color:grey">/ Date of Entry</i>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;"></td>
                <td style="width: <?= $isi ?>%;"></td>
                <td>
                    <p style="font-size:<?= $_isi_font ?>px;"> <?= strtoupper($data['setupPrint']['nama']) ?> </p=>
                </td>
                <td style="width: <?= $isi ?>%;"></td>
                <td>
                    <p style="font-size:<?= $_isi_font ?>px;"> &nbsp;&nbsp;<?= $tglem ?> <i style="font-size:<?= $_isi_font ?>px;color:grey">/ <?= date("F d, Y", strtotime(ucfirst($data['setupPrint']['tgl_masuk'])))?></i> </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;height:30px"></td>
                <td colspan="2">
                    <p style="font-size:13px">
                        NOMOR INDUK MAHASISWA
                        <i style="font-size:13px;color:grey">/ Registration Number</i>
                    </p>
                </td>
                <td colspan="2" style="width: <?= $_col_width ?>%;">
                    <p style="font-size:13px">
                        &nbsp;&nbsp;TANGGAL LULUS
                        <i style="font-size:13px;color:grey">/ Date of Completion</i>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;"></td>
                <td style="width: <?= $isi ?>%;"></td>
                <td>
                    <p style="font-size:<?= $_isi_font ?>px;"> <?= strtoupper($data['setupPrint']['nim']) ?> </p>
                </td>
                <td style="width: <?= $isi ?>%;"></td>
                <td>
                    <p style="font-size:<?= $_isi_font ?>px;"> &nbsp;&nbsp;<?= $tgle ?> <i style="font-size:<?= $_isi_font ?>px;color:grey">/ <?= date("F d, Y", strtotime(ucfirst($data['setupPrint']['tgl_lulus'])))?></i> </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;height:35px"></td>
                <td colspan="2">
                    <p style="font-size:13px">
                        TEMPAT, TANGGAL LAHIR
                        <i style="font-size:13px;color:grey"> / Place, Date of Birth</i>
                    </p>
                </td>
                <td colspan="2" style="width: <?= $_col_width ?>%;">
                    <p style="font-size:13px">
                        &nbsp;&nbsp;GELAR
                        <i style="font-size:13px;color:grey">/ Tittle</i>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;height: 75px;"></td>
                <td style="width: <?= $isi ?>%;"></td>
                <td style="vertical-align:top; width: 45%;">
                    <p style="font-size:<?= $_isi_font ?>px;"> <?= ucfirst($data['setupPrint']['ttl']) ?> <i style="font-size:<?= $_isi_font ?>px;color:grey">/ <?=$tml . ", " . date("F d, Y", strtotime($tglettl)) ?></i>  </p>
                </td>
                <td style="width: <?= $isi ?>%;"></td>
                <td style="vertical-align:top">
                    <p style="font-size:<?= $_isi_font ?>px;"> &nbsp;&nbsp;Sarjana Teknik (S. T.) <i style="font-size:<?= $_isi_font ?>px;color:grey">/ Bachelor of Engineering</i></p>
                </td>
            </tr>

            <!-- Nomer 2 -->
            <tr>
                <td colspan="5">
                    <p style="font-size:13px">
                        <b> 2. IDENTITAS PENYELENGGARA PROGRAM </b>
                        <i style="font-size:13px;color:grey">/ Identity of Awarding Institutions</i>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;"></td>
                <td colspan="2">
                    <p style="font-size:13px">
                        PERGURUAN TINGGI
                        <i style="font-size:13px;color:grey">/ Awarding Institutions</i>
                    </p>
                </td>
                <td colspan="2" style="width: <?= $_col_width ?>%;">
                    <p style="font-size:13px">
                        &nbsp;&nbsp;TOTAL SKS
                        <i style="font-size:13px;color:grey">/ Total of Credit Semester Unit</i>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;"></td>
                <td style="width: <?= $isi ?>%;"></td>
                <td>
                    <p style="font-size:<?= $_isi_font ?>px;">
                        <?= $data['setupAplikasi']->univ_id ?>
                        <i style="font-size:<?= $_isi_font ?>px;color:grey">/<?= $data['setupAplikasi']->univ_en ?></i>
                    </p>
                </td>
                <td style="width: <?= $isi ?>%;"></td>
                <td>
                    <p style="font-size:<?= $_isi_font ?>px;">
                        &nbsp;&nbsp;<?= $data['setupPrint']['total_sks'] ?> sks
                        <i style="font-size:<?= $_isi_font ?>px;color:grey">/<?= $data['setupPrint']['total_sks'] ?> credits</i>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;height:33px"></td>
                <td colspan="2">
                    <p style="font-size:13px">
                        PROGRAM STUDI
                        <i style="font-size:13px;color:grey">/ Department</i>
                    </p>
                </td>
                <td colspan="2" style="width: <?= $_col_width ?>%;">
                    <p style="font-size:13px">
                        &nbsp;&nbsp;DURASI STUDI REGULER
                        <i style="font-size:13px;color:grey">/ Regular Duration of Study</i>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;"></td>
                <td style="width: <?= $isi ?>%;"></td>
                <td>
                    <p style="font-size:<?= $_isi_font ?>px;">
                        <?= $data['setupAplikasi']->prodi_id ?>
                        <i style="font-size:<?= $_isi_font ?>px;color:grey">/<?= $data['setupAplikasi']->prodi_en ?></i>
                    </p>
                </td>
                <td style="width: <?= $isi ?>%;"></td>
                <td>
                    <p style="font-size:<?= $_isi_font ?>px;">
                        &nbsp;&nbsp;<?= $data['semester'] ?> Semester <?= $data['total_bulan'] ?> Bulan
                        <i style="font-size:<?= $_isi_font ?>px;color:grey">/<?= $data['semester'] ?> Semester <?= $data['total_bulan'] ?> Month</i>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;height:30px"></td>
                <td colspan="2">
                    <p style="font-size:13px">
                        FAKULTAS
                        <i style="font-size:13px;color:grey"> / Faculty</i>
                    </p>
                </td>
                <td colspan="2" style="width: <?= $_col_width ?>%;">
                    <p style="font-size:13px">
                        &nbsp;&nbsp;SISTEM PENILAIAN
                        <i style="font-size:13px;color:grey">/ Grading System</i>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;height:40px"></td>
                <td style="width: <?= $isi ?>%;"></td>
                <td style="vertical-align: top;">
                    <p style="font-size:<?= $_isi_font ?>px;">
                        <?= $data['setupAplikasi']->fakultas_id ?>
                        <i style="font-size:<?= $_isi_font ?>px;color:grey">/<?= $data['setupAplikasi']->fakultas_en ?></i>
                    </p>
                </td>
                <td style="width: <?= $isi ?>%;"></td>
                <td style="vertical-align: top;">
                    <p style="font-size:<?= $_isi_font ?>px;"> &nbsp;&nbsp;A=4; A-=3.7; B+=3.3; B=3; C+=2.7; C=2; D=1; E=0 </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;"></td>
                <td colspan="2">
                    <p style="font-size:13px">
                        JENIS DAN STRATA PENDIDIKAN <br>
                        <i style="font-size:13px;color:grey"> Type and Level of Educations</i>
                    </p>
                </td>
                <td colspan="2" style="width: <?= $_col_width ?>%;">
                    <p style="font-size:13px">
                        &nbsp;&nbsp;PERSYARATAN PENERIMAAN <br>
                        <i style="font-size:13px;color:grey">&nbsp;&nbsp;Entry Requirements</i>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width: <?= $head_width ?>%;"></td>
                <td style="width: <?= $isi ?>%;"></td>
                <td style="vertical-align: top;">
                    <p style="font-size:<?= $_isi_font ?>px;">
                        Akademik & Sarjana (Strata 1) <br>
                        <i style="font-size:<?= $_isi_font ?>px;color:grey">Academic & Bachelor Degree</i>
                    </p>
                </td>
                <td style="width: <?= $isi ?>%;"></td>
                <td style="vertical-align: top;">
                    <p style="font-size:<?= $_isi_font ?>px;">
                        &nbsp;&nbsp;Lulus Pendidikan Menengah Atas/Sederajat <br>
                        <i style="font-size:<?= $_isi_font ?>px;color:grey">&nbsp;&nbsp;Graduate from High School or Similar Education Level</i>
                    </p>
                </td>
            </tr>
        </table>
    </div>
    <p style="height: 52px;">
    </p>
    <div style="position: fixed;">
        <div style="float: left; width: 60%;">
            <p style="text-align: left;font-size:10px;color:white">
                <?= strtoupper($data['setupPrint']['nama']) ?> - <?= strtoupper($data['setupPrint']['nim']) ?>
            </p>
        </div>
        <div style="float: right; width: 23%;">
            <p style="text-align: right;font-size:10px;color:white">
                &nbsp;&nbsp;HALAMAN 1 DARI 3 <i style="font-size:10px;color:white"> / PAGE 1 OF 3</i>
            </p>
        </div>
    </div></body>
</html>