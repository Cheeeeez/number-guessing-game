<?php
session_start();
if (isset($_REQUEST['low'])) {
    $_SESSION['left'] = $_SESSION['mid'] + 1;
    $_SESSION['mid'] = floor(($_SESSION['left'] + $_SESSION['right']) / 2);
} elseif (isset($_REQUEST['high'])) {
    $_SESSION['right'] = $_SESSION['mid'] - 1;
    $_SESSION['mid'] = floor(($_SESSION['left'] + $_SESSION['right']) / 2);
} elseif (isset($_REQUEST['end'])) {
    session_destroy();
    header('location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .content {
            width: 600px;
            margin: auto;
            text-align: center;
            font-size: 50px;
            color: blue;
        }

        input {
            font-size: large;
        }
    </style>
</head>
<body>
<div class="content">
    <?php
    if (isset($_SESSION['mid'])) {
        echo "Secret number is <br>" . $_SESSION['numbers'][$_SESSION['mid']];
    }
    ?>
    <form method="post" action="round2.php">
        <input class="btn btn-danger" type="submit" value="Too low" name="low">
        <input class="btn btn-warning" type="submit" value="Too high" name="high">
        <input class="btn btn-success" type="submit" value="Exactly" name="end">
    </form>
</div>
</body>
</html>
