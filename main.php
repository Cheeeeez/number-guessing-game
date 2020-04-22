<?php
session_start();
include_once "Function.php";
if (empty($_SESSION['numbers']) && empty($_SESSION['left']) && empty($_SESSION['right']) && empty($_SESSION['mid'])) {
    $_SESSION['numbers'] = range(1, 100);
    setLeftMidRight();
} else {
    if (isset($_REQUEST['low'])) {
        {
            array_splice($_SESSION['numbers'], $_SESSION['left'], $_SESSION['mid'] + 1);
            setLeftMidRight();
            if (empty($_SESSION['numbers'])) {
                resetGame();
            }
        }
//    $_SESSION['left'] = $_SESSION['mid'] + 1;
//    $_SESSION['mid'] = floor(($_SESSION['left'] + $_SESSION['right']) / 2);
    } elseif (isset($_REQUEST['high'])) {
        array_splice($_SESSION['numbers'], $_SESSION['mid']);
        setLeftMidRight();
        if (empty($_SESSION['numbers'])) {
            resetGame();
        }
//        $_SESSION['right'] = $_SESSION['mid'] - 1;
//        $_SESSION['mid'] = floor(($_SESSION['left'] + $_SESSION['right']) / 2);
    } elseif (isset($_REQUEST['end'])) {
        resetGame();
    }
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
    if (isset($_SESSION['mid']) && empty($message)) {
        echo "Secret number is <br>" . $_SESSION['numbers'][$_SESSION['mid']];
    } else {
        echo $message;
    }
    ?>
    <form method="post" action="">
        <input class="btn btn-danger" type="submit" value="Too low" name="low">
        <input class="btn btn-warning" type="submit" value="Too high" name="high">
        <input class="btn btn-success" type="submit" value="Exactly" name="end">
    </form>
</div>
</body>
</html>
