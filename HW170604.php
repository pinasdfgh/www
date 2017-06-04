<?php
session_start();
$memObj=$_SESSION['member'];
var_dump($memObj);
include 'SQLmember.php';
$pdo = new pdo($dsn, $user, $passwd, $opt);
?>
<script src="libs/js/jquery.js"></script>

<h1>OX遊戲</h1>

<from>
    <input type='button' id="create" value="create">
    <input type="button" id="add" value="add" name="">
</from>


<script>
    var member=<?php echo json_encode($memObj) ?>;
    console.log(member);

    $("#create").click(function(){
        $.ajax({url:'HWCroom.php',type:'post',data:{account:member.account}},success:function (data){

        })

    });

</script>
