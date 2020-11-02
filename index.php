<?php
include "convert.php";

include('./template.php');

$t = new Template();

$t->header();

?>

<html>

<head>
    <title>vigenere chipper</title>
    
    <script type="text/javascript">
    function SelectAll(id){
        document.getElementById(id).focus();
        document.getElementById(id).select();
    }
    </script>
</head>

<br><br>
<center>
    <h3>Simple Vigenere Chipher implementation with PHP</h2>
    <h4><a onclick="Info()">by Ely Nur Rahayu</a></h4>
<br>
<div class="card col-lg-6 py-3">
    <form action="" method="post">
        <div class="form-group">
            <label>Kunci</label>
            <input type="text"  class="form-control" name="key_vigenere" id="key_vigenere"  value="the key..." onclick="SelectAll('key_vigenere')" />
            <small id="messageHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
             <label>Plan Text</label>
            <textarea rows="4" class="form-control" name="plantext_vigenere" id="plantext_vigenere" cols="33" onclick="SelectAll('plantext_vigenere')" >plan text...</textarea><br/>
            <!-- <input type="submit" class="form-control" value="Info?" onclick="InfoVigenere()" /> -->

            <small id="keyHelp" class="form-text text-muted"></small>
        </div>       
        <button type="submit" class="btn btn-primary" name="encrypt_vigenere" value="Encrypt">Enkripsi</button>
        <button type="submit" class="btn btn-primary" name="decrypt_vigenere" value="Decrypt">Dekripsi</button>
        <button type="reset" class="btn btn-warning" value="Reset">Reset</button>
    </form>
</div>
 </center>

<br>
<center>
<div class="card col-lg-6 py-3">
    <form action="" method="post">
        <div class="form-group">

    <label><b>Chipper Text</b></label>
    <br>

    <?php
    //----------------------------------------------------------------//
    // vigenere                                                       //
    //----------------------------------------------------------------//
if ((isset($_POST['key_vigenere'])) && (isset($_POST['plantext_vigenere'])) && (isset($_POST['encrypt_vigenere']))){
            $key=$_POST['key_vigenere'];
            $plantext=$_POST['plantext_vigenere'];
            $len_key=strlen($key);
            $len_plantext=strlen($plantext);
            $split_key=str_split($key);
            $split_plantext=str_split($plantext);
            
            echo '<textarea rows="4" id="result" cols="33" onclick="SelectAll(\'result\')" >';
            $i=0;
            for($j=0;$j<$len_plantext;$j++){
                if ($i==$len_key){
                    $i=0;
                }
                $split_key2[$j]=$split_key[$i];
                $i++;
            }
            for($k=0;$k<$len_plantext;$k++){
                $a=char_to_dec($split_key2[$k]);
                $b=char_to_dec($split_plantext[$k]);
                if (($a && $b)!=null){
                    echo (tabel_vigenere_encrypt($a, $b));
                } else {
                    echo $split_plantext[$k];
                }
            
            /* 
            Kita anggap saja bahwa yang horizontal adalah tiap karakter plantext nya, dan vertikalnya
            adalah key nya. Misal kita punya karakter pertama untuk plantext “z”, key “n” maka karakter
            cipher text yang harus didapat adalah “m” sesuai tabel.
            Kita gunakan fungsi konversi char_to_dec() yang telah buat diatas, untuk mengambil nilai
            desimal dari karakter “z”, “n”, dan “m”.
            z = 26
            n = 14
            m = 13
            setelah melakukan beberapa perhitungan dengan menggunakan beberapa sample, akhirnya
            didapat rumus :
            c = p + k – 1 → jika c > 26, maka c = c - 26
            dimana : c = karakter ciper text yang dicari
             p = karakter plantext
             k = karakter key
            misal : m = 26 + 14 – 1
             m = 39 ( m > 26 )
             m = 39 – 26
             m = 13 (terbukti)
            */           

}

             echo '</textarea><br/>';
        } else if ((isset($_POST['key_vigenere'])) && (isset($_POST['plantext_vigenere'])) && (isset($_POST['decrypt_vigenere']))){
            $key=$_POST['key_vigenere'];
            $plantext=$_POST['plantext_vigenere'];
            $len_key=strlen($key);
            $len_plantext=strlen($plantext);
            $split_key=str_split($key);
            $split_plantext=str_split($plantext);
            
            echo '<textarea rows="4" id="result" cols="33" onclick="SelectAll(\'result\')" >';
            $i=0;
            for($j=0;$j<$len_plantext;$j++){
                if ($i==$len_key){
                    $i=0;
                }
                $split_key2[$j]=$split_key[$i];
                $i++;
            }
            
            for($k=0;$k<$len_plantext;$k++){
                $a=char_to_dec($split_key2[$k]);
                $b=char_to_dec($split_plantext[$k]);
                if (($a && $b)!=null){
                    echo (tabel_vigenere_decrypt($b, $a));
                } else {
                    echo $split_plantext[$k];
                }
            }
            
            echo '</textarea><br/>';

        } else {
            echo "result here...";
        }
    ?>
    </td></tr>
    <tr><td valign="top">

    </td></tr>
    </div>
</form>
</div>

</body>
</html>
<br><br><br>
</center>
<?php
$t->footer();

?>





