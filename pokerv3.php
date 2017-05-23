<?php
$a=range(0,51);
//foreach ($a as $value){
//    echo $value ."<br>";
//}
shuffle($a);

foreach ($a as $i=>$value){

    $player[$i%4][(int)($i/4)]=$value;
}

//for($i=0;$i<sizeof($player),$i++){

//    sort($player[0]);
//}
//foreach ($player[0] as $i=>$value){
//
//    echo $value;
//}
//
//?>

<table border="1" width="100%">

        <?php
        $suit=array('<font color="black" size="6">&spades;</font>'
        ,'<font color="red" size="6">&hearts;</font>'
        ,'<font color="red" size="6">&diamondsuit;</font>'
        ,'<font color="black" size="6">&clubs;</font>');

        $point=array('A',2,3,4,5,6,7,8,9,10,'J','Q','K');
        foreach ($player as $sb){
            natsort($sb);
            echo "<tr>";
            foreach($sb as $key=>$crad){
                $sb[$key]= "{$point[($crad%13)]}{$suit[(int)($crad/13)]}";
                echo $sb[$key];
            }
            natsort ($sb);
            foreach($sb as $key=>$crad){
                echo "<td>$crad</td>";

            }


            echo "</tr>";
        }
        ?>


</table>
