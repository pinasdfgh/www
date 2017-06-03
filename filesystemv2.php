<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filesystem</title>
    <link rel="stylesheet" href="./libs/css/bootstrap.css">
    <script src="libs/js/jquery.js"></script>
    <style>
        li{
            height: 50px;
            margin: 0px;
            overflow: hidden;
        }
        ul{
            margin: 0px;
            padding: 0px;
            overflow: hidden;
            position: relative;
            left:20px;
        }
        article{
            height: 100%;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-inverse">
    <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="./Download" name="path">
        </div>
        <button type="submit" class="btn btn-default">search</button>
    </form>

</nav>

<div class="row">
    <aside class="col-lg-2">

        <!----------------------------------li樣板---------------------------------------------------------------------->
        <ul class="list-group s0 action">
            <li class="list-group-item action">
                <span class="glyphicon glyphicon-chevron-down"></span>
                <span class="glyphicon glyphicon-folder-open"></span>
                New
                <span class="badge">12</span>
            </li>
            <ul class="list-group s0 s1">
                <li class="list-group-item action">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                    <span class="glyphicon glyphicon-folder-open"></span>
                    New <span class="badge">12</span></li>
                    <ul class="list-group s0 s1 s2 action" >
                        <li class="list-group-item">
                            <span class="glyphicon glyphicon-file"></span>
                            New <span class="badge">12</span></li>
                        <li class="list-group-item">Deleted <span class="badge">5</span></li>
                        <li class="list-group-item">Warnings <span class="badge">3</span></li>
                    </ul>

                <li class="list-group-item">Deleted <span class="badge">5</span></li>
                <li class="list-group-item">Warnings <span class="badge">3</span></li>
            </ul>
            <li class="list-group-item">Deleted <span class="badge">5</span></li>
            <li class="list-group-item">Warnings <span class="badge">3</span></li>
        </ul>
        <!----------------------------------li樣板--------------------------------------------------------------------->

    </aside>

    <article class="col-lg-10" style="background-color: red">
        <h1>123456789</h1>
    </article>

</div>
<div class="well" style="position:fixed; bottom: 0px;width:100% ;margin:0px">upload</div>

</body>

</html>
