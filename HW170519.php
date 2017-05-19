<?php
if(isset($_GET["x"])) {
    $x = $_GET["x"];
    $y = $_GET["y"];
    $o=$_GET["operator"];
    switch ($o){
        case "1":
            $r=$x+$y;
            break;
        case "2":
            $r=$x-$y;
            break;
        case "3":
            $r=$x*$y;
            break;
        case "4":
            $r=(int)($x/$y);
            $e=$x%$y;
            $r="$r......$e";
            break;

    }
}
?>

<form>
    <input type="text" name="x" id="x" value="<?php echo $x?>"/>
    <select id="operator" name="operator">
        <option value="1">+</option>
        <option value="2">-</option>
        <option value="3">x</option>
        <option value="4">/</option>
    </select>
    <input type="text" name="y" id="y" value="<?php echo $y?>"/>
    <input type="submit" value="=" />
    <?php echo $r?>
</form>
<script>
    window.onload=function(){
        var i="<?php echo $o?>";

            if( i==""){
                operator.options[0].selected=true;
            }else {
                operator.options[i-1].selected=true;
            }
        }


</script>


