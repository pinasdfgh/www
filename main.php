<?php
include "SQL2.php";
session_start();
if(isset($_SESSION['memberObj'])){
    $memberObj=$_SESSION['memberObj'];
}else{
    header("Location:login.php");
}
$pdo = new pdo($dsn, $user, $passwd, $opt);
$sql = "select * from food order by addr limit 10 ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$stmt->errorCode()

?>

hollow :<?php echo $memberObj->realname ?>
<hr>
<table border="1" width="100%">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Tel</th>
        <th>Addr</th>
        <th>Memo</th>
    </tr>
    <?php
    while ($row = $stmt->fetchObject()){
        echo '<tr>';
        echo "<td>{$row->fid}</td>";
        echo "<td>{$row->fname}</td>";
        echo "<td>{$row->tel}</td>";
        echo "<td>{$row->addr}</td>";
        echo "<td>{$row->host}</td>";
        echo '</tr>';
    }
    ?>
</table>
<a href="logout.php">logout</a>
