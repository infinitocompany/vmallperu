<?php
require_once "../conf.php";
$user = mp_scape($_POST['user']);
$name = mp_scape($_POST['name']);
$lastname = mp_scape($_POST['lastname']);
$phone = mp_scape($_POST['phone']);
$movil = mp_scape($_POST['movil']);
$date = time();
switch($do){
    case 2: 
        $cn->query("INSERT INTO vmall_users(user, name, lastname, phone, movil, date) VALUES('$user', '$name', '$lastname', '$phone', '$movil', '$date')");
        break;
    case 3: 
        $cn->query("UPDATE vmall_users SET status = '".($_POST['value'] == 1 ? 0 : 1)."' WHERE id = '".$_POST['id']."'");
        break;
    case 4:
        $cn->query("DELETE FROM vmall_users WHERE id = '".$_POST['id']."'");
        break;
    case 5: 
        $cn->query("UPDATE vmall_users SET user = '$user', name = '$name', lastname = '$lastname', phone = '$phone', movil = '$movil', date = '$date' WHERE id = '".$_POST['id']."'");
        break;
}
?>