<?php
if(isset($_GET['account'])){
$account=$_GET['account'];
$passwd=password_hash($_GET['passwd'],PASSWORD_DEFAULT);
$realname=$_GET['realname'];
$db=new mysqli('127.0.0.1','root','root','iii');
$sql="insert into member (account,password,realname)value 
('$account','$passwd','$realname')";

$db->query($sql);
header('Location:php38.php');
}
?>
<form>
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
            <th>Real Name</th>
            <td><input type="text" name="realname"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="new"></td>
        </tr>
    </table>
</form>