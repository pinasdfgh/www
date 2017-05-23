<hmtl>

<head>
    <meta charset="utf-8"/>
    <link href="libs/css/bootstrap.min.css" rel="stylesheet">
    <script src="libs/js/jquery.js"></script>
    <title>質數判斷</title>
    <style>
        #table{
            position: relative;
            font-family: Georgia, "Times New Roman", Times, serif;
            color: purple;
            float: left;
            width: 100%;
            margin: 20px;
        }
        .tab{
            font-size: 1em;
            border: 2px solid black;

        }
        #ok{
            font-size: 30;
            text-align: center;
            height: 100px;
        }
        #ng{
            font-size: 20;
            text-align: center;
            height: 100px;
        }


    </style>

</head>
<body>
<div class="col-sm-1"></div>
<form class="navbar-form navbar-left " role="search">
    <div class="form-group">
        <input id="total" type="text" class="form-control" placeholder="請輸入判斷範圍" name="total" value="">
    </div>
    <button id="output" type="submit" class="btn btn-default">Submit</button>

</form>

<script>
    $(function(){
        $("#output").click(function () {
            localStorage.setItem(document.getElementById("total").name, document.getElementById("total").value);
        })
        $("#total").val(localStorage["total"]);

    })



</script>


<div id="table"  >
<?php
//echo pow(4,1/2)
$total=$_GET["total"];$divide=10;
for($k=1;$k<$total+1;$k+=$divide){
    echo '<div class="row ">';
    echo '<div class="col-sm-1"></div>';
    for($i=$k;$i<$k+$divide;$i++){
        $squrt=(int)pow($i,1/2);
        $j=1;
        $isright=true;
        //判斷質數
        while($j<$squrt) {
            $j++;
            if ($i % $j == 0) {
                $isright=false;
                break;
            }
        }
        if($isright){
            echo '<div id="ok" class="col-sm-1 tab text-danger bg-danger" >'."{$i}<br>質數" .'</div>';
        }else{
            echo '<div id="ng" class="col-sm-1 tab text-success bg-success" >'."{$i}" .'</div>';
        }
    }
    echo '</div>';
}
?>
</div>
</body>

</hmtl>