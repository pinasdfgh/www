<!DOCTYPE HTML>
<html><head>
    <meta charset="utf-8">
    <title>Canvas Background through CSS</title>
    <style type="text/css" media="screen">
        canvas, img { display:block; margin:1em auto; border:1px solid black; }
        canvas {
            background:url(./test.jpg);
            width:100vw;
            height:100vh

        }
    </style>
</head>
<body>

<h1>sdsadsd</h1>
<canvas></canvas>
<img>
<script type="text/javascript" charset="utf-8">
    var can = document.getElementsByTagName('canvas')[0];
    var ctx = can.getContext('2d');
    ctx.strokeStyle = '#f00';
    ctx.lineWidth   = 6;
    ctx.lineJoin    = 'round';
    ctx.strokeRect(140,60,40,40);
    var img = document.getElementsByTagName('img')[0];
    img.src = can.toDataURL();
</script>
</body></html>