<?php
$y = $_GET["year"];
if (isset($y)) {


    if ($y % 4 != 0) {
        $result = "NO";
    } elseif ($y % 100 != 0) {
        $result = "yes";
    } elseif ($y % 400 != 0 && $y % 100 == 0) {
        $result = "NO";
    } else {
        $result = "yes";
    }

    if ($y % 400 == 0) {
        $result = "yes";
    }
}
?>


<form>
    <h1>請輸入年份:計算閏年</h1>
    <input type="text" name="year" value=""/>
    <input type="submit"/>
    <br>
    <h2><?php echo $result ?></h2>


</form>
