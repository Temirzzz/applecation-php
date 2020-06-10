<?php
// setcookie('id', $row['id'], time()-30*24*60*60, "./");
// setcookie('hash', $hash, time()-30*24*60*60, "./");

if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
header('Location: ./login.php');
?>
