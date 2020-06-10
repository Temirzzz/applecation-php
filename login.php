<?php
require_once('core/config.php');
require_once('core/functions.php');
require_once('template/header.php');
require_once('template/footer.php');
$conn = connect();



if (isset($_POST['password']) AND $_POST['password'] != '') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $query = mysqli_query($conn, "SELECT id, userpassword FROM admin WHERE userlogin='".$login."'LIMIT 1");
    var_dump($query);
    $row = mysqli_fetch_assoc($query);
    print_r($row);
    
    if ($row['userpassword'] == md5($_POST['password'])) {
        $hash = genHash (20);
        mysqli_query($conn, "UPDATE admin SET hash='".$hash."' WHERE id=".$row['id']);
        setcookie('id', $row['id'], time()+30*24*60*60);
        setcookie('hash', $hash, time()+30*24*60*60, null, null, null, true);
        header('Location: ./admin.php');
        exit();
    }
    else {
        echo "Введи верные данные :)";
    }
}

close ($conn);
?>

<div class="container">
    <div class="row">
        <div class=" offset-4 col-4">
            <h1 class="text-center mt-5">Панель администратора</h1>
            <form method="POST" class="mt-5">
                <div class="form-group">
                    <label for="login">Email</label>
                    <input type="text" class="form-control" id="login"  name="login" >
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password"  name="password">
                </div>                
                <button class="btn btn-info" type="submit">Войти</button>
            </form>
        </div>
    </div>
</div>
