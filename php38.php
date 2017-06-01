<?php
$db=new mysqli('127.0.0.1','root','root','iii');

if(isset($_GET['delid'])){
    $delid=$_GET['delid'];
    $sql="delete from member where id=$delid";
    $db->query($sql);
}

$sql = 'select * from member';
$rs = $db->query($sql);
?>
<a href="addMember.php">NEW</a>
<table width="100%" border="1">
<hr>
<tr>
    <th>id</th>
    <th>account</th>
    <th>password</th>
    <th>realname</th>
    <th>delete</th>
    <th>edit</th>
</tr>
<tr>
    <?php
    while ($row = $rs->fetch_object()){
        echo '<tr>';
        echo "<td>{$row->id}</td>";
        echo "<td>{$row->account}</td>";
        echo "<td>{$row->password}</td>";
        echo "<td>{$row->realname}</td>";
        echo "<td><a href='?delid={$row->id}'>del</td>";
        echo "<td><a href='editMember.php?editid={$row->id}'>edit</td>";
        echo "</tr>";
    }
    ?>
</tr>
</table>