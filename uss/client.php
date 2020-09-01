<?php
session_start();
include '..\lang.php';
$con123 = $_SESSION['con123'];
if($_GET["exit"]){ session_destroy(); header("Location: ..\lg\lg.php");
}
if (isset($_GET['lang'])){ $_SESSION['user']['lang'] = $_GET['lang'];
}
if (!(isset($_SESSION['login'])) && !(isset($_SESSION['password']))){ session_destroy(); header('Location: ..\lg\lg.php');
}
if ($_SESSION['user']['lang'] == 'ru'){
    echo $lang[0]['ru'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[3]['ru'];
} else if ($_SESSION['user']['lang'] == 'en') {
    echo $lang[0]['en'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[3]['en'];
} else if ($_SESSION['user']['lang'] == 'ua') {
    echo $lang[0]['ua'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[3]['ua'];
} else if ($_SESSION['user']['lang'] == 'it') {
    echo $lang[0]['it'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[3]['it'];
}
?>
<html>
<head>
</head>
<form method="GET">
    <input type="submit" name="exit"  value="Exit">
</form>
<form >
    <select name="lang" method="GET">  <option value="ru">Русский</option>  <option value="ua">Українська</option>
        <option value="en">English</option>  <option value="it">Italian</option>
    </select>
    <input type="submit" value="Save">
</form>
</html>
