<?php
function setLeftMidRight()
{
    $_SESSION['left'] = 0;
    $_SESSION['right'] = count($_SESSION['numbers']) - 1;
    $_SESSION['mid'] = floor(($_SESSION['left'] + $_SESSION['right']) / 2);
}

function resetGame()
{
    session_destroy();
    header('location: index.php');
}