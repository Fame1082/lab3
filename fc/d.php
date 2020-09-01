<html lang="ru">
<head>
</head>
<body>
<?php
session_start();
require_once '../bd.php';
$sql = mysqli_query($con123, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['push']}");
if (isset($_GET['del_id'])) {
    $sql = mysqli_query($con123, "DELETE FROM `users` WHERE `id` = {$_GET['del_id']}");
    if ($sql) {
        echo "<p>Пользователь удален.</p>";
    } else {
        echo '<p>ошибка: ' . mysqli_error($con123) . '</p>';
    }
}
?>
<table border = '1' >
    <tr >
        <td > id</td >
        <td > Name</td >
        <td > Surname</td >
        <td > Login</td >
        <td > Password</td >
        <td > Language</td >
        <td > Role</td >
        <td > Удаление</td >
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
                "<td><a href='?del_id={$result['id']}'>Удалить</a></td>" .
                '</tr>';
        }
    ?>
</table>
</body>
</html>
