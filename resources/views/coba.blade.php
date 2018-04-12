<?php
$nama = "Santren Koding";
echo $nama;
?>
<br>
//Syntax Echo di laravel
{{$nama = "Santren Koding",$nama}}
<br>
//menyambungkan string sssssssssssss{{"Kelas "." Belajar"}}
<br>


<?php
    $nilai = 70;
    if($nilai <= 60){
      echo "Tidak Lulus";
    }else{
      echo "Lulus";
    }

 ?>

 @if($nilai<=60)
   <p>Tidak Lulus</p>
 @else
   <p>Lulus</p>
 @endif
