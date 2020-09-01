<?php
session_start();
require_once '../bd.php';
$login = $_POST["login"];
$password = $_POST["password"];


$outbase = mysqli_query($conn123, "SELECT * FROM `users` WHERE `login` = '" . $login . "' AND `password` = '" . $password . "' ");
$_SESSION['outbase'] = $outbase;
$user = mysqli_fetch_assoc($outbase);


$_SESSION['user'] = array("id" => $user['id'], "name" => $user['name'], "surname" => $user['surname'], "login" => $user['login'], "password" => $user['password'], "role" => $user['role'], "lang" => $user['lang']);


if (mysqli_num_rows($outbase) > 0){ $_SESSION['login'] = $login; $_SESSION['password'] = $password;
    if ($user['role'] == 'admin'){
        $_SESSION['role'] = $user['role'];
        header('Location: ..\us\admin.php');
    }else if($user['role'] == 'manager'){
        $_SESSION['role'] = $user['role'];
        header('Location: ..\us\manager.php');
    }else if($user['role'] == 'client'){
        $_SESSION['role'] = $user['role'];
        header('Location: ..\us\client.php');
    }
}else {
    echo 'Неверные данные';
    header('location: lg.php');
}
