<?php
if(isset($_GET["x"])) {
    $x = $_GET["x"];
    $y = $_GET["y"];
    $r = $x + $y;
}
?>

<form>
    <input type="text" name="x" id="x" value="<?php echo $x?>"/>
    +
    <input type="text" name="y" id="y" value="<?php echo $y?>"/>
    <input type="submit" value="=" />
    <?php echo $r?>
</form>

