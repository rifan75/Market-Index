<?php

function flash($title=null, $message=null)
{

	$flash=app('App\Http\Flash');

	if (func_num_args()==0 ) {
	    return $flash;
	}

	return $flash->info($title, $message);

}

function tanggal_indonesia($tgl, $tampil_hari=true){
  $nama_hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
  $nama_bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus",
                      "September","Oktober","Nopember","Desember");

  $tahun = substr($tgl,0,4);
  $bulan = $nama_bulan[(int)substr($tgl,5,2)];
  $tanggal = substr($tgl,8,2);

  $text = "";

  if ($tampil_hari){
    $urutan_hari = data('w',mktime(0,0,0,substr($tgl,5,2),$tanggal,$tahun));
    $hari = $nama_hari[$urutan_hari];
    $text =$hari.", ";
  }
  $text =$tanggal ." ". $bulan." ".$tahun;
  return $text;
}

function uang($angka){
  $hasil = number_format($angka,0,',','.');
  return $hasil;
}

function terbilang($angka){
  $angka = abs($angka);
  $baca = array ("","satu","dua","tiga","empat","lima","enam","tujuh","delapan","semblan",
                 "sepuluh","sebelas");
  $terbilang = "";

  if ($angka<12) {
    $terbilang = " ". $baca[$angka];
  }else if($angka < 20){
    $terbilang = ($angka -10). "belas";
  }else if($angka < 100){
    $terbilang = ($angka /10). "puluh". terbilang($angka %10);
  }else if($angka < 200){
    $terbilang = "seratus". terbilang($angka -100);
  }else if($angka < 1000){
    $terbilang = ($angka /100)."ratus". terbilang($angka %100);
  }else if($angka < 2000){
    $terbilang = "seribu". terbilang($angka -1000);
  }else if($angka < 1000000){
    $terbilang = ($angka /1000)."ribu". terbilang($angka %1000);
  }else if($angka < 1000000000){
    $terbilang = ($angka /1000000)."juta". terbilang($angka %1000000);
  }
  return $terbilang;
}

function generate_upc_checkdigit($upc_code)
{
    $odd_total  = 0;
    $even_total = 0;

    for($i=0; $i<11; $i++)
    {
        if((($i+1)%2) == 0) {
            /* Sum even digits */
            $even_total += $upc_code[$i];
        } else {
            /* Sum odd digits */
            $odd_total += $upc_code[$i];
        }
    }

    $sum = (3 * $odd_total) + $even_total;

    /* Get the remainder MOD 10*/
    $check_digit = $sum % 10;

    /* If the result is not zero, subtract the result from ten. */
    return ($check_digit > 0) ? 10 - $check_digit : $check_digit;
}
