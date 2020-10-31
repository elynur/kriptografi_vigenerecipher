<?php

function char_to_dec($a){
	$i=ord($a);
	if ($i>=97 && $i<=122){
		return ($i-96);
	} else if ($i>=65 && $i<=90){
		return ($i-38);
	} else {
		return null;
	}
}

function dec_to_char($a){
	if ($a>=1 && $a<=26){
		return (chr($a+96));
	} else if ($a>=27 && $a<=52){
		return (chr($a+38));
	} else {
		return null;
	}
}

function tabel_vigenere_encrypt($a, $b){
	$i=$a+$b-1;
	if ($i>26){
		$i=$i-26;
	}
	return (dec_to_char($i));
}
/*fungsi diatas meminta parameter berupa nilai desimal dari karakter plantext ($a) dan nilai
desimal dari karakter key ($b), kemudian mengembalikan bentuk karakter dari hasil perhitungan
pada tabel vigenere dengan menggunakan fungsi dec_to_char().
Sisanya adalah tinggal bagaimana menginputkan plantext dan key kedalam fungsi, kemudian
mendapatkan hasil yang dikembalikan oleh fungsi.*/


?>
