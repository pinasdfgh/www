<table  width="100%" border="1">
    <?php
    $strat=2;$col=4;$line=2;
    for($row=0;$row<$line;$row++){
        echo "<tr>";
        for($j=$strat;$j<$strat+$col;$j++){
            $newj=$j+$row*$col;
//            if($j%2!=0){
//                if($row%2==0){
//                    echo "<td bgcolor='#dc143c'>";
//                }else{
//                    echo "<td bgcolor='#4169e1'>";
//                }
//            }else{
//                if($row%2!=0){
//                    echo "<td bgcolor='#dc143c'>";
//                }else{
//                    echo "<td bgcolor='#4169e1'>";
//                }
//            }
//            if(($j+$row)%2!=0){
//                echo "<td bgcolor='#dc143c'>";
//            }else{
//                   echo "<td bgcolor='#4169e1'>";
//            }
            echo '<td bgcolor='.((($j+$row)%2)==0?'#dc143c':'#4169e1').'>';

            for($i=1;$i<10;$i++){
                $r=$newj*$i;
                echo "{$newj}x{$i}={$r} <br>";
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>














</table>
