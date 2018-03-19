<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ekfo</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
    

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="row">
        <? foreach($params as $key=>$value): ?>
        <div class="col-xs-4">
            <div class="title text-center">
                <h3><?= $value['title'] ?></h3>
            </div>
            <div class="desc text-center">
                <p><?= $value['desc'] ?></p>
            </div>
            <div class="link text-center">
                <a class="btn btn-default" href="<?= $value['link'] ?>">Link</a>
            </div>
        </div>
        <? endforeach ?>
        <div class="clearfix"></div>
    </div>
</div>

</body>
</html>