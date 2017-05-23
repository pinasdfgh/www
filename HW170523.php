<table width="100%" border="1">
<?php
//echo pow(4,1/2)
$total=150;$divide=15;
for($k=1;$k<$total+1;$k+=$divide){
    echo '<tr style="width: 150px; height: 100px;">';
    for($i=$k;$i<$k+$divide;$i++){
        $squrt=(int)pow($i,1/2);
        $j=1;
        $isright=true;
        //判斷質數
        while($j<$squrt) {
            $j++;
            if ($i % $j == 0) {
                $isright=false;
                break;
            }
        }
        if($isright){
            echo '<td style="background-color: orange">'."{$i}" .'</td>';
        }else{
            echo '<td style="background-color: papayawhip">'."{$i}" .'</td>';
        }

    }
    echo '</tr>';
}
?>
</table>