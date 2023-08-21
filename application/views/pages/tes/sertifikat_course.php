<?php
    function day($n) {
        $n = intval($n);
        if ($n >= 11 && $n <= 13) {
            return "{$n}<sup>th</sup>";
        }
        switch ($n % 10) {
            case 1:  return "{$n}<sup>st</sup>";
            case 2:  return "{$n}<sup>nd</sup>";
            case 3:  return "{$n}<sup>rd</sup>";
            default: return "{$n}<sup>th</sup>";
        }
    }

    function tgl_sertifikat($tgl){
        $data = explode("-", $tgl);
        $hari = $data[0];
        $bulan = $data[1];
        $tahun = $data[2];

        if($bulan == "01") $bulan = "January";
        if($bulan == "02") $bulan = "February";
        if($bulan == "03") $bulan = "March";
        if($bulan == "04") $bulan = "April";
        if($bulan == "05") $bulan = "May";
        if($bulan == "06") $bulan = "June";
        if($bulan == "07") $bulan = "July";
        if($bulan == "08") $bulan = "August";
        if($bulan == "09") $bulan = "September";
        if($bulan == "10") $bulan = "October";
        if($bulan == "11") $bulan = "November";
        if($bulan == "12") $bulan = "December";

        return $bulan . " " . $hari . ", " . $tahun;
    }
?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .qrcode{
            width: 210px;
			position: absolute;
            left: 100px;
			bottom: 150px;
            font-size: 35px;
            word-spacing: 3px;
        }

        .nilai{
            /* background-color: red; */
            width: 95px;
			position: absolute;
            left: 683px;
			top: 525px;
            font-size: 20px;
            font-family: 'montserrat';
            word-spacing: 5px;
            color: #6a7b83;
            font-weight: bold;
        }

        .total{
            /* background-color: red; */
            width: 95px;
			position: absolute;
            left: 345px;
			top: 565px;
            font-size: 20px;
            font-family: 'montserrat';
            /* word-spacing: 3px; */
            color: #6a7b83;
            font-weight: bold;
        }

        .nama{
            /* background-color: red; */
            width: 1000px;
			position: absolute;
            left: 63px;
			top: 273px;
            font-size: 39px;
            /* font-family: 'rockb'; */
            font-family: 'montserrat';
            word-spacing: 3px;
            color: #013e58;
        }

        .ttl{
            /* background-color: red; */
            width: 250px;
			position: absolute;
            left: 520px;
			bottom: 183px;
            font-size: 16px;
            font-family: 'montserrat';
            word-spacing: 3px;
            color: #6a7b83;
        }

        .t4{
            /* background-color: red; */
			position: absolute;
            <?php if(strlen($t4_lahir) < 12 ) echo 'width: 129px;';?>
            /* right: 229px; */
            left : 888px;
			top: 355px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }
        
        .listening{
            /* background-color: red; */
            width: 95px;
			position: absolute;
            left: 683px;
			top: 453px;
            font-size: 18px;
            font-family: 'montserrat';
            word-spacing: 3px;
            color: #6a7b83;
        }
        
        .structure{
            /* background-color: red; */
            width: 95px;
			position: absolute;
            left: 683px;
			top: 477px;
            font-size: 18px;
            font-family: 'montserrat';
            word-spacing: 3px;
            color: #6a7b83;
        }
        
        .reading{
            /* background-color: red; */
            width: 95px;
			position: absolute;
            left: 683px;
			top: 501px;
            font-size: 18px;
            font-family: 'montserrat';
            word-spacing: 3px;
            color: #6a7b83;
        }

        .tgl{
            /* background-color: red; */
            width: 250px;
			position: absolute;
            left: 143px;
			bottom: 113px;
            font-size: 16px;
            font-family: 'montserrat';
            word-spacing: 3px;
            color: #6a7b83;
        }

        .no_doc{
            /* background-color: red; */
            width: 250px;
			position: absolute;
            left: 207px;
			bottom: 94px;
            font-size: 16px;
            font-family: 'montserrat';
            word-spacing: 3px;
            color: #6a7b83;
        }

        .gender{
            width: 129px;
			position: absolute;
            left: 373px;
			top: 407px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        .country{
            width: 129px;
			position: absolute;
            left: 631px;
			top: 407px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        .language{
            width: 129px;
			position: absolute;
            right: 210px;
			top: 407px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        .tgl_akhir{
			position: absolute;
            left: 797px;
			bottom: 100px;
            font-size: 18px;
            font-family: 'rock';
            word-spacing: 3px;
        }

        @page :first {
            background-image: url("<?= base_url()?>assets/img/sertifikat_course.png");
            background-image-resize: 6;
        }
        
    </style>
</head>
    <body style="text-align: center">
        <div class="qrcode">
            <img src="<?= base_url()?>assets/qrcode_course/<?= $id?>.png" width=120 alt="">
        </div>
        <!-- <div class="total">Total</div> -->
        <div class="nilai"><p style="text-align: right; margin: 0px"><?= round($skor)?></p></div>
        <div class="nama"><p style="text-align: center; margin: 0px"><b><?= $nama?></b></p></div>
        <div class="ttl"><p style="text-align: left; margin: 0px"><?= tgl_sertifikat(date("d-m-Y", strtotime($tgl_lahir)))?></p></div>
        <!-- <div class="t4"><p style="text-align: center; margin: 0px;"><?= $t4_lahir?></p></div> -->
        <!-- <div class="gender"><p style="text-align: center; margin: 0px"><?= $jk?></p></div> -->
        <!-- <div class="country"><p style="text-align: center; margin: 0px"><?= $country?></p></div> -->
        <!-- <div class="language"><p style="text-align: center; margin: 0px"><?= $language?></p></div> -->
        <div class="listening"><p style="text-align: right; margin: 0px"><?= $listening?></p></div>
        <div class="structure"><p style="text-align: right; margin: 0px"><?= $structure?></p></div>
        <div class="reading"><p style="text-align: right; margin: 0px"><?= $reading?></p></div>
        <div class="no_doc"><p style="text-align: left; margin: 0px"><?= $no_doc?></p></div>
        <div class="tgl"><p style="text-align: left; margin: 0px"><?= tgl_sertifikat(date("d-m-Y", strtotime($tgl_tes)))?></p></div>
        <!-- <div class="tgl_akhir"><p style="text-align: center; margin: 0px"><?= tgl_sertifikat(date("d-m-Y", strtotime('+2 years', strtotime($tgl_tes))))?></p></div> -->
    </body>
</html>