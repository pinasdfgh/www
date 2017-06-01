<?php
include "SQLapi.php";
session_start();

if(isset($_POST['account'])){
    $pdo = new pdo($dsn, $user, $passwd, $opt);
    $account=$_POST['account'];
    $passwd=$_POST['passwd'];

    $sql="select * from member where account=?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$account]);
    var_dump($stmt);
    if($stmt->rowCount()>0){
        $memberObj=$stmt->fetchObject();
        if(password_verify("$passwd",$memberObj->password)){
//            echo 'ok';
            $_SESSION['memberObj']=$memberObj;
            header("Location:main.php");
        }else{
            echo 'X1';
        }
    }else{
        echo 'XX';
    }

}
?>
<form method="post">
    <table>
        <tr>
            <th>Account</th>
            <td><input type="text" name="account"></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="password" name="passwd"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="new"></td>
        </tr>
    </table>
</form>