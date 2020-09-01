<html lang="ru">
<head>
</head>
<body>
<?php
session_start();
require_once '../bd.php';
$sql = mysqli_query($con123, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['push']}");
if (isset($_POST["Name"])) {

    if (isset($_GET['push'])) {
        $sql = mysqli_query($con123, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['push']}");
        $sql = mysqli_query($con123, "UPDATE `users` SET `name` = '{$_POST['Name']}',`surname` = '{$_POST['Surname']}',`login` = '{$_POST['Login']}',
                                                            `password` = '{$_POST['Password']}',`lang` = '{$_POST['Language']}',`role` = '{$_POST['Role']}' WHERE `id`={$_GET['push']}");
    } else {

        $sql = mysqli_query($con123, "INSERT INTO `users` (`name`, `surname`,`login`,`password`,`lang`,`role`) VALUES ('{$_POST['Name']}', '{$_POST['Surname']}','{$_POST['Login']}',
                                                            '{$_POST['Password']}','{$_POST['Language']}','{$_POST['Role']}')");
    }
}
if (isset($_GET['push'])) {
    $sql = mysqli_query($con123, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['push']}");
    $user = mysqli_fetch_array($sql);
}
?>
<form action = "" method = "post" >
    <table >
        <tr >
            <td > Name:</td >
            <td ><input type = "text" name = "Name" value = "<?= isset($_GET['push']) ? $user['Name'] : ''; ?>" ></td >
        </tr >
        <tr >
            <td > Surname:</td >
            <td ><input type = "text" name = "Surname" value = "<?= isset($_GET['push']) ? $user['Surname'] : ''; ?>" ></td >
        </tr >
        <tr >
            <td > Login:</td >
            <td ><input type = "text" name = "Login" value = "<?= isset($_GET['push']) ? $user['Login'] : ''; ?>" ></td >
        </tr >
        <tr >
            <td > Password:</td >
            <td ><input type = "text" name = "Password" value = "<?= isset($_GET['push']) ? $user['Password'] : ''; ?>" ></td >
        </tr >
        <tr >
            <td > Language:</td >
            <td ><input type = "text" name = "Language" value = "<?= isset($_GET['push']) ? $user['Language'] : ''; ?>" ></td >
        </tr >
        <tr >
            <td > Role:</td >
            <td ><input type = "text" name = "Role" value = "<?= isset($_GET['push']) ? $user['Role'] : ''; ?>" ></td >
        </tr >
        <tr >
            <td colspan = "2" ><input type = "submit" value = "OK" ></td >
        </tr >
    </table >
</form >

<table border = '1' >
    <tr >
        <td > id</td >
        <td > Name</td >
        <td > Surname</td >
        <td > Login</td >
        <td > Password</td >
        <td > Language</td >
        <td > Role</td >
        <td > Редактирование</td >
    </tr >

 <?php
        $sql = mysqli_query($con123, 'SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users`');
        while ($result = mysqli_fetch_array($sql)) {
            echo '<tr>' .
                "<td>{$result['id']}</td>" .
                "<td>{$result['name']}</td>" .
                "<td>{$result['surname']}</td>" .
                "<td>{$result['login']}</td>" .
                "<td>{$result['password']}</td>" .
                "<td>{$result['lang']}</td>" .
                "<td>{$result['role']}</td>" .
                "<td><a href='?push={$result['id']}'>Изменить</a></td>" .
                '</tr>';
        }
    ?>
</body>
</html>
