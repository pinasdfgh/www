<?php
    include "pinasdapi.php";
    //server cookie 記憶體開起:主要記憶對象為brower
    session_start();
    $memberObj=new Member('A123456789');
    $cartObj=new Cart($memberObj);
    echo $cartObj->getmember()->twid->getTWID();
    echo $memberObj->twid->getTWID().'<br>';
    $var1=10;
    //$_SEESION為紀錄 obj為指標記憶 變數為值記憶
    $_SESSION['cart']=$cartObj;
    $_SESSION['var1']=$var1;

    $var1++;

    $cartObj->addItem('pid01',4);
    $cartObj->addItem('pid02',6);

    foreach ($cartObj->getlist() as $pid=>$qty){
        echo "{$pid}:{$qty}<br>";
    }
?>
<hr>
<a href="php36.php">Next</a>